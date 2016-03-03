# simple-php-cms
For Education Only

API Examples
-------------------------
GET ./api/posts/select.php

query parameters #1 : search=????? OR id=? | title=? | content=? | created_date=? | modified_date=?

query parameters #2 : orderby=???

query parameters #3 : order=ASC | DESC

query parameters #4 : limit=??

query parameters #5 : offset=??

-------------------------
POST ./api/posts/create.php

query parameters #1 : title=?????

query parameters #2 : content=?????

Basic Auth

-------------------------
POST ./api/posts/update.php

query parameters #1 : id=?????

query parameters #2 : title=?????

query parameters #3 : content=?????

Basic Auth

-------------------------
POST ./api/posts/delete.php

query parameters #1 : id=?????

Basic Auth

-------------------------
GET ./api/users/select.php

query parameters #1 : search=????? OR id=? | username=? | email=? | created_date=?

query parameters #2 : orderby=???

query parameters #3 : order=ASC | DESC

query parameters #4 : limit=??

query parameters #5 : offset=??

-------------------------
POST ./api/users/register.php

query parameters #1 : username=?????

query parameters #2 : password=?????

query parameters #3 : email=?????

