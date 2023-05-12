# 1

A very basic censor application. Improvents could be made to the UI by utalizing jQuerey and AJAX to dynamically display the data, while the backend could support files using the PHP $_FILES array. However for this excersise I found a basic web page to be suffiecent. 

# 2

To store this information we need a database of some sort, I would personally use mySQL due to its compatability with PHP and the fact that it is a relational database. We would then need two tables, one that stores the masked out data and one that stores the censored phrases with a many to many relationship between the phrases and the documents they were censored out it. To help increase security slightly (there is still the issue that a brute force attack can be used to get lots of information about the documents and the phrases that were censored in them) I would store only the Hashed values of the censored words and keyphrases, that way incase of a database leak the data cannot be reconstructed. To make it searchable I would use a sanatized SQL querey against the words and phrases table doing a join with the documents table on the previously mentioned many to many relationship. To expose it to external consumers I would first like to build out a login system of some kind (to prevent the afformentioned brute force attack) and then create a search page not too dissimilar from my 
