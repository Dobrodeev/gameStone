select FirstName,MiddleName, LastName,City
from Customers where City='����'
union
select FirstName,MiddleName, LastName,City
from Suppliers where City='����'

select * from Customers
union
select * from Suppliers
--coment--