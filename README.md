# LiveChat
## Aligent LiveChat Module
### Overview
This LiveChat module developed for the programming test part 2. It is a custom Magento 2 module that allows administrators to manage LiveChat configurations via the Magento Admin Panel. The module provides the ability to save and log LiveChat configuration data, view the logs in a grid format, and ensure secure and efficient data storage using Magento 2 best practices, such as Service Contracts and Repositories.

### Features
* Admin UI to submit LiveChat configuration details.
* Data saving using service contracts and repository patterns.
* Logging of LiveChat configuration changes.
* Grid-based viewing of log entries, with date filtering and sorting.
* Modular and scalable using Magento 2's UI components and dependency injection.

### Installation 
1. Add the Repository to Composer
   First, add the GitHub repository to your Composer configuration:
``` 
composer config repositories.aligent_live_chat vcs https://github.com/amilaudana/coding-part-2-v1
``` 
2. Install the Module
   Once the repository is added, install the module using:

``` 
composer require amilaudana/coding-part-2-v1:dev-main
``` 

2. Enable the Module
   After installation, enable the module and run the Magento setup commands:

``` 
php bin/magento module:enable Aligent_LiveChat
php bin/magento setup:upgrade
php bin/magento setup:di:compile
```

3. Clear Magento Cache
   Once enabled, make sure to flush the cache to apply the changes:
 
``` 
php bin/magento cache:flush
```

### Usage
#### Admin Form
The LiveChat configuration form can be accessed via the Magento Admin:

Go to Aligent > LiveChat Admin Form to enter and update LiveChat configuration details such as License Number, Groups, and Parameters.
#### Logs Grid
The module also provides a log grid where you can view the changes made to LiveChat configurations:

Go to Aligent > Manage LiveChat Logs to see the logs of configuration changes. The log records the License Number, Groups, Params, the action performed, and the timestamp.
### Key Components
#### Service Contracts
The module uses Magento 2’s service contracts for saving configuration data, ensuring modularity and flexibility.

* Aligent\LiveChat\Api\LiveChatLogRepositoryInterface: The interface for saving LiveChat logs.
* Aligent\LiveChat\Model\LiveChatLogRepository: The concrete implementation of the repository.
#### UI Components
The admin form is rendered using Magento 2's UI components.
* ui_livechat_form.xml: Defines the admin form layout and fields.
* ui_livechat_log_listing.xml: Defines the log listing page.
#### Logging
Each time LiveChat configuration is saved, the module creates an entry in the aligent_livechat_log table, recording the License Number, Groups, Params, and the action that was performed.

### Testing
#### Unit Tests
Unit tests are provided for the LiveChatLogRepository to ensure the save functionality works correctly.

To run the unit tests, use:
```
vendor/bin/phpunit app/code/Aligent/LiveChat/Test/Unit/Model/LiveChatLogRepositoryTest.php
```

### License
This module is licensed under the MIT License. 

