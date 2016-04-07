# Database structure

This file was created to give a better understanding of the database structure.

## Tables
- **Timestamps** : Logs creation and update date of objects
- **User** : Contains usual informations about users (identity, location...)
- **Role** : Describes different roles that can be assigned to users
- **Roles_User** : Roles assigned to the users
- **Rights_Role** : Rights (read and write) attributed to each role
- **Template** : Contains names and description of different templates possible (Animal Protection, Sport...)
- **Menu** : Contains all menus that can be added to templates
- **Menus_Template** : Links menus to a specific template
