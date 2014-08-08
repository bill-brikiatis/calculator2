# Bill Brikiatis P4 Planting Date Calculator

## Live URL
The Live URL is <http://calculator2.gopagoda.com/>.

## Description
This is a site called Planting Date Calculator. It allows those who are logged in to enter a postal code and it converts it to the locations average last frost date. Vegetable gardeners can use this date to decide when to plant.

## Details for teaching team
The site has been seed with approximately 20 postal codes for teacher assistant testing. The valid postal codes are in the FrostTableSeeder for reference. When a user enters a postal code that is invalid or not yet in the system, the site tells the user.

The site also has been seeded with three users (two with admin authority, one without). This will allow the teaching assistant to test lock down of pages and routes for Admin.

There is an Admin page with three forms:
* Manually add postal code - last frost dates
* Manually enter email and password for admin access to the Admin page.
* Frost date form that will allow the Admin to test conversions.

The site uses PHP & Laravel. It includes Laravel user authentication, git (with a very healthy number of commits) and two database tables.

A future version will implement form validation and will add more functionality.

## Outside code
* Paste/Pre for debugging
* Susan's database debug script
* phpMyAdmin was added to the site for debugging
* A little CSS from Twitter Bootstrap


