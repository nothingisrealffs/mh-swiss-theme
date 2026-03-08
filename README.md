# mh-swiss-theme
Theme for class, variation of the Swiss Theme
As part of our assignment we were asked to look at how Digital News Publications approach their visual design, to look at outlets like The New York Times, The Atlantic, and Politico for inspiration on how they structure their layouts.

We are supposed to pay attention to:
  1.Typographic Scale
  2.Whitespace and grid structure
  3.Restrained Color Usage
  4.Article Card Patterns

I found this to be difficult for two reasons; number one is that I'm trash at PHP, figuring this out very quickly. The second is that i'm a huge minimalist, and as said: " A theme that relies on browser defaults or minimal styling will not meet the standard for this criterion"; this meant that I actually had to pay attention to the CSS for once. I've used a series of defaults for a while, and as such i had to go back and start from scratch.
So for this I figured out the PHP first. Basically took a copy of each PHP file in the notes, and figured out sorta "what it did". Once I felt I had a grasp on that, I worked out what each of the individual variables worth noting for the design, and had those in a list for the research stage.
On research, I mixed what I love, minimalism, with styles that I liked to look at. I utilized Gemini within this sphere to help research two things: 

  1. The Aggregate CSS flow of multiple types of news websites
  2. The Benefits and Risks of different type of styles.


This helped me settle on a version of "Swiss" theme, as noted:

  "“Swiss Style” and “Swiss Design” refer to Swiss graphic design and the associated typography that achieved international fame in the 1950s and 1960s. Swiss poster art was particularly popular at that time. But beyond posters, Swiss Design is also associated with the formation of new principles of graphic design in the middle of the 20th century. It is believed that many elements of computer design were influenced by Swiss Style"


I like the idea that it kept my minimalism idea with a design element that is supposed to make it look purposeful. I created more pages than required because I was not paying attention to the requirements and instead pulled from the notes.


# Wordpress Theme Structure and Archtecture:

Wordpress is interestingly split apart into disparate entities for what i thought it would be. The idea is that the Styles and the Index are really the only important things to be looked at here, everything else is gravy.
When someone visits a URL on my site, Wordpress runs through a quick if_exists() that helps it establish if a templaate file exists for a specific type of content" starting from the most specific and working for the most general much like a coin slot machine, you put a quarter in and it will not fall into the hole the size of a dime!. For a single post it checks does the single-post-{slug}.php exist? No? Does archive? Yeah? Use it!

If nothing exists, it falls back to index! But honestly, thats probably a problem.
style.css has the different bits that have to "tie together" into one.
functions.php loads on every page request BEFORE any template.
header.php and footer.php are considered "fragments" in PHP (modularity!) which means we can apply them at will with get_header() and get_footer(). If you've only ever worked with HTML raw you can start to understand why they wrote PHP like this versus other "Modern" languages, as I started coding with bash and Python 2; it makes PHP feel backwards until you look at just writing raw html and how that kind of sucks.


# The Loop

the structure of the code for the loop has so far (and from what i've read thus far) been the same across the board, if(have_posts()): Do shit; endwhile; endif; This establishes if there are any posts at all (if(have_posts) will return true if there are posts), while have_posts (Do shit) keeps it going as long as there are posts. the_post() is just the data that then displays, title, content, date, author, into a set of global variables that the template tags read from, and can dynamically build what is necessary to get it going. Fascinatingly, there are some that start with the_ and some get_the_, difference being one shows output directly, basically calls a print function (BASICALLY, ITS NOT ACTUAL) and get_the_ is how you can get the data to be able to use elsewhere.
