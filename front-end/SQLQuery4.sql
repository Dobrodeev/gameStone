select FirstName,MiddleName, LastName,City
from Customers
union
select FirstName,MiddleName, LastName,City
from Suppliers

order by City desc,LastName