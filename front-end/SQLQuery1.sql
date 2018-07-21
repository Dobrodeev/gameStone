select FirstName,MiddleName, LastName,City
from Customers where City='киев'
union
select FirstName,MiddleName, LastName,City
from Suppliers where City='киев'

select * from Customers
union
select * from Suppliers
--coment--