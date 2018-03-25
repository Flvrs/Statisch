<?php

namespace Flvrs\Statisch;

class Config
{
    private $data = [];

    public function load(string $file): bool
    {
        if (!file_exists($file)) {
            return false;
        }

        $this->data = array_merge($this->data, (include $file));
        return true;
    }

    public function get(string $key, $default = null)
    {
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }

        if (strpos($key, '.') !== false) {
            $data = $this->data;
            foreach (explode('.', $key) as $key_part) {
                if (array_key_exists($key_part, $data)) {
                    $data = $data[$key_part];
                }
            }
            return $data;
        }

        return $default;
    }
}