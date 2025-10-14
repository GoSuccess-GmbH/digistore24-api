<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Api\Base;

use GoSuccess\Digistore24\Api\Contract\RequestInterface;
use GoSuccess\Digistore24\Api\Http\Method;
use GoSuccess\Digistore24\Api\Util\ArrayHelper;
use GoSuccess\Digistore24\Api\Util\Validator;

/**
 * Abstract Request Base Class
 * 
 * Base class for all API request objects.
 * Uses PHP 8.4 features for clean, type-safe requests.
 */
abstract class AbstractRequest implements RequestInterface
{
    /**
     * Get the API endpoint for this request
     */
    abstract public function getEndpoint(): string;

    /**
     * Get the HTTP method for this request
     */
    public function getMethod(): Method
    {
        return Method::POST;
    }

    /**
     * Convert request to array for API call
     * 
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $data = [];
        
        foreach (get_object_vars($this) as $property => $value) {
            // Skip null values
            if ($value === null) {
                continue;
            }

            // Convert to API format (snake_case)
            $key = ArrayHelper::toSnakeCase($property);
            
            // Handle nested objects
            if ($value instanceof self) {
                $data[$key] = $value->toArray();
            } elseif (is_array($value)) {
                $data[$key] = $this->convertArray($value);
            } elseif ($value instanceof \DateTimeInterface) {
                $data[$key] = $value->format('Y-m-d H:i:s');
            } elseif ($value instanceof \BackedEnum) {
                $data[$key] = $value->value;
            } else {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    /**
     * Convert array values recursively
     * 
     * @param array<mixed> $array
     * @return array<mixed>
     */
    private function convertArray(array $array): array
    {
        return array_map(function ($value) {
            if ($value instanceof self) {
                return $value->toArray();
            }
            if ($value instanceof \DateTimeInterface) {
                return $value->format('Y-m-d H:i:s');
            }
            if ($value instanceof \BackedEnum) {
                return $value->value;
            }
            if (is_array($value)) {
                return $this->convertArray($value);
            }
            return $value;
        }, $array);
    }

    /**
     * Validate the request
     * 
     * @return array<string, string[]> Validation errors
     */
    public function validate(): array
    {
        $rules = $this->rules();
        
        if (empty($rules)) {
            return [];
        }

        return Validator::validate($this->toArray(), $rules);
    }

    /**
     * Get validation rules
     * 
     * Override in subclasses to define validation rules.
     * 
     * @return array<string, array{rule: string, params?: array<mixed>, message?: string}>
     */
    protected function rules(): array
    {
        return [];
    }

    /**
     * Check if request is valid
     */
    public function isValid(): bool
    {
        return empty($this->validate());
    }

    /**
     * Ensure request is valid or throw exception
     * 
     * @throws \InvalidArgumentException
     */
    public function ensureValid(): void
    {
        $errors = $this->validate();
        
        if (!empty($errors)) {
            $messages = [];
            foreach ($errors as $field => $fieldErrors) {
                $messages[] = "{$field}: " . implode(', ', $fieldErrors);
            }
            throw new \InvalidArgumentException(
                'Request validation failed: ' . implode('; ', $messages)
            );
        }
    }
}
