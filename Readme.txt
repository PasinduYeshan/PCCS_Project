
In Model and DB.php in core
Some functions have additional prarameter named $idField.
Reason - Otherwise primary key or search key should be "id" field always.
Changed Function------------------------

DB.php---------core
update()
delete()

Model.php---------core
update()
delete()
--------------------------------------------------------------------------------------
//??? -> this means I dont have a much understanding about that
Resolve them later or dont use them

Eg:-
Model.php in core -
    data() function
    assign() function
    

