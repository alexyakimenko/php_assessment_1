<?php

namespace App\Core;

class JsonDB
{
    private string $path;

    /**
     * Connects to a JSON database file.
     *
     * @param string $filename The name of the JSON file (without extension) to connect to.
     * @return JsonDB The JsonDB instance connected to the specified file.
     */
    public static function connect(string $filename): JsonDB {
        $connection = new JsonDB();
        $connection->path = sprintf("%s/$filename.json", Config::dataDir);

        return $connection;
    }

    /**
     * Saves data to the JSON file.
     *
     * @param array $data The data to be saved.
     * @return void
     */
    public function saveData(array $data): void {
        file_put_contents($this->path, json_encode($data));
    }

    /**
     * Adds data to the JSON file.
     *
     * @param array $data The data to be added.
     * @return void
     */
    public function addData(array $data): void {
        $currentData = $this->getData();
        $currentData[] = $data;
        $this->saveData($currentData);
    }

    /**
     * Retrieves data from the JSON file.
     *
     * @return array The data retrieved from the JSON file.
     */
    public function getData(): array {
        if (!file_exists($this->path)) {
            return [];
        }

        $data = file_get_contents($this->path);
        return json_decode($data, true);
    }
}