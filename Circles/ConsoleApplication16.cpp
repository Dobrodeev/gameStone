// ConsoleApplication16.cpp : Defines the entry point for the console application.
//

#include "stdafx.h"
#include <iostream>


class myClass
{
private:
	int number = 0;

public: 
	
	myClass(int number)
	{
		this->number = number;
	}

	void print()
	{
		std::cout << number << "\n";
	}

	void print(myClass obj)
	{
		std::cout << obj.number << "\n";
	}

	// operator  ++X
	int operator ++ ()
	{
		number++;
		return number;
	}


	// operator  X++
	int operator ++ (int N)
	{
		int temp = number;
		number++;
		return temp;
	}


};


int main()

{
	for (size_t i = 0; i < 999999999; ++i)
	{

	}
	
	myClass obj(12);
	myClass obj2(33);

	obj.print(++obj2);
	
	obj2.print();


	
	
	return 0;
}

