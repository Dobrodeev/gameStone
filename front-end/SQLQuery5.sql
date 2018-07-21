select distinct FirstName,LastName,PhoneNumber
from Customers
join Phones
on Customers.ID=Phones.CustomerID