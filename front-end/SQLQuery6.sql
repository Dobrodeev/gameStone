select distinct FirstName,LastName,count(PhoneNumber)
from Customers
left join Phones
on Customers.ID=Phones.CustomerID
Group by FirstName,LastName