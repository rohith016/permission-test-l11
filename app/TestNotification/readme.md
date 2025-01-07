# Sample App 11 - TestNotification

## Directory Structure

```
/var/www/html/sample-app-11/app/TestNotification/
├── HasHighPriority.php
├── HighPriority.php
├── Invoice.php
├── Notification.php
└── readme.md
```

## Classes

### HasHighPriority

- **Description**: This traits handles the high priority channel details.
- **Methods**:
    - `highPriorityChannel()`: print or return the high priority channel name.

### HighPriority

- **Description**: This interface work as a marker interface (toggle behaviour without adding methods). the interface communicate that the class has a perticular behaviour or should treated differently.
- **Methods**:


### Invoice

- **Description**: This class will work as the child class that inherit the `Notification` class, implement the `HighPriority` interface and use the `HasHighPriority` trait.

`Notification` class is the parent class and it contains the main action methods to show the priority (high or normal) and the `HighPriority` interface work as marker interface which check in the `Notification` class `send()` and determine whether the child class is the instance of the `HighPriority` interface if it is the instance we can call `sendHighPriority()` method in the `Notification` class if it not the instance the we will call `sendNormal()` method here `polymorhism` concept is working. same as we call a `highPriorityChannel()` in the   `sendHighPriority() `method which is actually defined in the  `HasHighPriority` traits which means we need to add the High Priority Channel functionaly only when the class implements the `HighPriority` interface

- **Methods**:


### Notification

- **Description**: This class handles action for priority channel based on the child class instance type
- **Methods**:
    - `send($message)`: work as polymorhic function to get the message as params and check the child class instance type and call the below functions respectively .
    - `sendHighPriority($message)`: just print high priority channel name with message params.
    - `sendNormal($message)`: just print normal priority channel name with message params.

## Workflow

1. **Initialization**: The process starts with initializing `Invoice` (new Invoice())->send('hello world').
2. **Processing**: `Invoice` performs its operations using `send`.
3. **Notification**: `Notification` takes over to complete the notification process using `send` and the interface in `Invoice` class check with which priority method or action should work.
