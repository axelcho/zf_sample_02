zf_sample_02
============

search and merge

A client asked to add a functionality in the admin menu, find and merge data in "production companies" field. The client has trouble with some "production companies" data with many different names. For example, Google, Google Inc., Google Inc are all the same entity, but appears as different companies in the data because they have different versions of the same name. 

It has a controller file, and a PHP file that do the ajax work (search and merge), basically deleting all but one of the most optimal name.

The challenge is that this change would disrupt the data in "Jobs" and "Credits" tables too, as these tables have foreign key to ProductionCompanies table.

So the ProductionCompanies.php makes changes to "Jobs" and "Credits" tables first, and then operates on "ProductionCompanies" page.


This project also requires quite complicated user input. Users have to go through multiple levels of engagement to get auto-suggestion, find similar company names, and choose one optimal company name. These operations are taken by javascript (shown in phtmls in the view folder).

