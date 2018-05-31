Custom api-v1 test project, without any frameworks. Initial SQL exists in /resources/sql.sql file.

Installation:

* Download dependencies: composer install
* Entry point: /public/index.php - Web root

Routes:

* '/' - For check installation, you just see message: API WORK!
* '/search' - Search method, need use post with json params like:

* {
* 	"search":"test1 manu1"
* }

example response:

* {
*    "data": [
*        {
*            "id": 1,
*            "type": "pen",
*            "manufacture": "manu1",
*            "vendor": "vendor3",
*            "color": "red"
*        },
*        {
*            "id": 1,
*            "type": "book",
*            "name": "test1",
*            "author": "author1",
*            "isbrn": "123-321"
*        },
*        {
*            "id": 1,
*            "type": "notebook",
*            "manufacture": "manu1",
*            "vendor": "vendor3",
*            "covertype": "hard"
*        },
*        {
*            "id": 2,
*            "type": "pen",
*            "manufacture": "manu1",
*            "vendor": "vendor4",
*            "color": "black"
*        },
*        {
*            "id": 2,
*            "type": "notebook",
*            "manufacture": "manu1",
*            "vendor": "vendor4",
*            "covertype": "soft"
*        }
*    ]
* }

database params can be changed in file: app/config/db.php