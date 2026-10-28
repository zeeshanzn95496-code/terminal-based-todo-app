<?php
// todo.php

$storageFile = __DIR__ . '/tasks.json';

// Initialize the JSON file if it doesn't exist
if (!file_exists($storageFile)) {
    file_put_contents($storageFile, json_encode([]));
}

while (true) {
    // 1. Fetch current tasks from the file
    $jsonContent = file_get_contents($storageFile);
    $tasks = json_decode($jsonContent, true);

    // 2. Display the Interactive Menu
    echo "\n=== PHP CLI TASK MANAGER ===\n";
    echo "1. List All Tasks\n";
    echo "2. Add a New Task\n";
    echo "3. Delete a Task\n";
    echo "4. Exit Application\n";
    echo "Choose an option (1-4):" ;

     // 3. Read user input from the terminal
    $choice = trim(fgets(STDIN));

    switch ($choice) {
        case '1':
            echo "\n--- CURRENT TASKS ---\n";
            if (empty($tasks)) {
                echo "No tasks found! Rest easy.\n";
            } else {
                foreach ($tasks as $index => $task) {
                    echo "[" . ($index + 1) . "] " . $task . "\n";
                }
            }
            break;
              case '2':
            echo "\nEnter task description: ";
            $newTask = trim(fgets(STDIN));
            if (!empty($newTask)) {
                $tasks[] = $newTask;
                file_put_contents($storageFile, json_encode($tasks, JSON_PRETTY_PRINT));
                echo "✅ Task added successfully!\n";
            } else {
                echo "❌ Task cannot be empty!\n";
            }
            break;
    }
}