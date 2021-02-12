## Deployment Process

### Upgrading

Performing Craft core updates can be done through the `./craft update craft` command. However, some issues may arise from database migrations due to some of the `config/general.php` variables.

Currently the steps for upgrading are:

1. Change `allowAdminChanges` in `config/general.php` to `true` for your specific environment.
2. Run `./craft update craft` from the project directory.
3. If it prompts you to backup the database, type `yes`. If something goes wrong you can revert the changes by typing `yes` again.
4. Once the update are complete, go back and change `allowAdminChanges` to false.
5. Celebrate!