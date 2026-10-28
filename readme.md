# PHP Terminal Todo App

A simple command-line task manager built with PHP that allows you to add, list, and delete tasks stored in a JSON file.

## Project Structure

```
todo/
├── todo.php      # Main application file (write all code here)
├── tasks.json    # Data storage file (auto-generated)
└── readme.md     # This file
```

## How to Write the Code

### File: `todo.php`

1. **Where to write**: Place all your PHP code in the `todo.php` file in the project root directory
2. **What to write**: The code should include:
   - File path setup for JSON storage
   - JSON file initialization
   - Interactive menu loop
   - Switch case for menu options (List, Add, Delete, Exit)
   - File read/write operations for task persistence

### Example Code Structure

```php
<?php
// todo.php

$storageFile = __DIR__ . '/tasks.json';

// Initialize the JSON file if it doesn't exist
if (!file_exists($storageFile)) {
    file_put_contents($storageFile, json_encode([]));
}

while (true) {
    // Fetch current tasks
    $jsonContent = file_get_contents($storageFile);
    $tasks = json_decode($jsonContent, true);

    // Display menu
    echo "\n=== PHP CLI TASK MANAGER ===\n";
    echo "1. List All Tasks\n";
    echo "2. Add a New Task\n";
    echo "3. Delete a Task\n";
    echo "4. Exit Application\n";
    echo "Choose an option (1-4): ";

    $choice = trim(fgets(STDIN));

    switch ($choice) {
        case '1':
            // List tasks logic
            break;
        case '2':
            // Add task logic
            break;
        case '3':
            // Delete task logic
            break;
        case '4':
            // Exit logic
            break;
    }
}
```

## How to Access/Run the Code

### Quick Start

1. Download or clone this project to your computer
2. **Important**: Replace all placeholder paths in this README with your actual project directory path
3. Install PHP (see Prerequisites below)
4. Run the application using one of the methods below

### Prerequisites

- PHP must be installed on your system
- PHP should be accessible from the command line

### Installation

1. **Install PHP** (if not already installed):
   - **Windows**: Download from [php.net](https://www.php.net/downloads) or use a package manager like Chocolatey: `choco install php`
   - **macOS**: Use Homebrew: `brew install php`
   - **Linux**: Use your package manager:
     ```bash
     sudo apt-get install php  # Ubuntu/Debian
     sudo yum install php      # CentOS/RHEL
     ```

2. **Verify PHP installation**:
   ```bash
   php --version
   ```

### Running the Application

#### Option 1: Running on Windows (Direct)

1. **Navigate to the project directory**:
   ```bash
   cd C:\path\to\your\todo\folder
   ```
   (Replace with your actual project directory path)

2. **Run the application**:
   ```bash
   php todo.php
   ```

   **If PHP is not recognized**, see the XAMPP section below.

3. **Use the application**:
   - Option 1: List all tasks
   - Option 2: Add a new task
   - Option 3: Delete a task
   - Option 4: Exit the application

#### ⚠️ Important Note: Using XAMPP for PHP

If you're using **XAMPP** instead of a standalone PHP installation:

1. **Install XAMPP** from [apachefriends.org](https://www.apachefriends.org/) if not already installed

2. **Try running with simple command first**:
   ```bash
   php todo.php
   ```

3. **If PHP is not recognized**, use the full XAMPP PHP path:
   ```bash
   C:\xampp\php\php.exe todo.php
   ```

4. **Why this happens**: XAMPP PHP is not automatically added to your system PATH by default.

5. **Recommended solution - Add XAMPP PHP to PATH**:
   - Add `C:\xampp\php` to your Windows PATH environment variable
   - This allows you to use `php todo.php` from any directory
   - You'll only need to do this once

**Note**: Once XAMPP PHP is in your PATH, you can use the simple `php todo.php` command just like in the main instructions above.

#### Option 2: Running with WSL (Windows Subsystem for Linux)

WSL provides a Linux environment on Windows, which is ideal for running PHP and other command-line tools.

##### Step 1: Install WSL

Open PowerShell as Administrator and run:

```bash
wsl --install
```

This will:
- Enable WSL and Virtual Machine Platform features
- Download and install Ubuntu (default Linux distribution)
- Prompt you to restart your computer

**After restart**, WSL will automatically open to complete the installation.

##### Step 2: Create Your WSL User Account

When WSL opens for the first time after restart, you'll see:

```
Installing, this may take a few minutes...
Please create a default UNIX user account. The username does not need to match your Windows username.
For more information visit: https://aka.ms/wslusers
Enter new UNIX username:
```

1. **Enter a username** (e.g., `zeeshan`, `user`, or any name you prefer)
   - Press Enter after typing the username

2. **Enter a password** (you won't see characters as you type - this is normal for security)
   - Type your password and press Enter
   - Retype the password to confirm and press Enter

3. **You're now logged in!** The prompt will show your username (e.g., `zeeshan@DESKTOP-XXX:~$`)

##### Step 3: Navigate to Your Project in WSL

WSL can access your Windows files through the `/mnt/c/` mount point:

```bash
cd /mnt/c/path/to/your/todo/folder
```

**Note**: 
- The path is lowercase in WSL (Windows `C:\` becomes `/mnt/c/`)
- Replace the path with your actual project directory
- Use forward slashes `/` instead of backslashes `\`

##### Step 4: Install PHP in WSL

```bash
sudo apt update
sudo apt install php -y
```

Enter your WSL password when prompted (the one you created in Step 2).

Verify installation:
```bash
php --version
```

##### Step 5: Run the Application in WSL

```bash
php todo.php
```

##### Step 6: Open WSL in VS Code

There are two ways to open your project in VS Code from WSL:

**Method 1: From WSL Terminal**

Navigate to your project directory in WSL, then run:
```bash
code .
```

This will:
- Install the VS Code Server in WSL (first time only)
- Open VS Code with WSL integration
- Allow you to edit files directly in the Linux environment

**Method 2: From VS Code**

1. Open VS Code on Windows
2. Press `Ctrl+Shift+P` to open Command Palette
3. Type `WSL: Reopen Folder in WSL` and select it
4. Choose your project directory when prompted

**Benefits of VS Code + WSL Integration:**
- Full Linux toolchain in VS Code
- Terminal automatically opens in WSL
- Extensions run in WSL context
- Seamless file editing between Windows and Linux

##### Useful WSL Commands

```bash
# Open current directory in VS Code from WSL
code .

# Return to Windows command prompt from WSL
exit

# Open WSL from Windows Terminal or PowerShell
wsl

# List installed WSL distributions
wsl -l -v

# Update WSL to latest version
wsl --update
```

### Useful Terminal Commands

#### Basic File Operations (works in PowerShell, WSL, and most terminals)

```bash
# List all files in current directory
ls

# Navigate to a directory
cd folder-name

# Go back to previous directory
cd ..

# Show current directory path
pwd  # WSL/Linux
or
Get-Location  # PowerShell
```

#### Creating and Editing Files

**Using nano (text editor):**
```bash
# Create or edit a file
nano filename.php

# Save and exit in nano:
# 1. Press Ctrl+O then Enter to save
# 2. Press Ctrl+X to exit
```

**Using VS Code from terminal:**
```bash
# Open current directory in VS Code
code .

# Open specific file in VS Code
code filename.php
```

#### Other Useful Commands

```bash
# Clear the terminal screen
clear  # WSL/Linux
or
cls  # Windows PowerShell

# Copy a file
cp source.php destination.php  # WSL/Linux
or
Copy-Item source.php destination.php  # PowerShell

# Delete a file
rm filename.php  # WSL/Linux
or
Remove-Item filename.php  # PowerShell
```

### Example Usage

```bash
$ php todo.php

=== PHP CLI TASK MANAGER ===
1. List All Tasks
2. Add a New Task
3. Delete a Task
4. Exit Application
Choose an option (1-4): 2

Enter task description: Complete the project
 Task added successfully!

=== PHP CLI TASK MANAGER ===
1. List All Tasks
2. Add a New Task
3. Delete a Task
4. Exit Application
Choose an option (1-4): 1

--- CURRENT TASKS ---
[1] Complete the project
```

## How It Works

1. **Storage**: Tasks are stored in `tasks.json` in the same directory
2. **Persistence**: Tasks are saved immediately when added or deleted
3. **Auto-initialization**: The JSON file is created automatically if it doesn't exist
4. **Interactive Loop**: The application runs continuously until you choose to exit

## Customization

You can modify the code in `todo.php` to:
- Add more features (mark tasks as complete, edit tasks, etc.)
- Change the menu options
- Add task categories or priorities
- Implement task filtering

## Troubleshooting

- **"php is not recognized"**: Ensure PHP is installed and added to your system PATH
- **Permission errors**: Make sure you have write permissions in the project directory
- **JSON file corrupted**: Delete `tasks.json` and the app will recreate it automatically

## License

This is a simple educational project. Feel free to modify and use as needed.
