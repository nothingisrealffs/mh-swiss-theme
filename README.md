# mh-swiss-theme

Theme for class, variation of the Swiss Theme

---

As part of our assignment we were asked to look at how Digital News Publications approach their visual design, to look at outlets like The New York Times, The Atlantic, and Politico for inspiration on how they structure their layouts.

We are supposed to pay attention to:

- **Typographic Scale**: Contrast between sizes of texts throughout the bodies of disparate tags
- **Whitespace and grid structure**: Whitespace and Grid Structures are used to help guide reader's attention
- **Restrained Color Usage**: Most professional editorial sites rely on neutral color pallets to keep focus
- **Article Card Patterns**: Many publications organize information into card layouts that can contain any number of elements inside without breaking brand

---

I found this to be difficult for two reasons; number one is that I'm trash at PHP, trying to be figuring this out very quickly. The second is that i'm a huge minimalist, and as said in the assignment guidelines: 
> "A theme that relies on browser defaults or minimal styling will not meet the standard for this criterion";

This meant that I actually had to pay attention to the CSS for once. I've used a series of defaults for a while, and as such i had to go back and start from scratch.

So for this I figured out the PHP first. Basically took a copy of each PHP file in the notes, and figured out sorta "what it did". Once I felt I had a grasp on that, I worked out what each of the individual variables worth noting for the design, and had those in a list for the research stage.

On research, I mixed what I love for "design", minimalism (how can I be lazy and still get the job done?), with styles that I liked to look at. I utilized Gemini within this sphere to help research two things:

- The Aggregate CSS flow of multiple types of news websites
- The Benefits and Risks of different type of styles

This helped me settle on a version of "Swiss" theme, as noted:

> "Swiss Style" and "Swiss Design" refer to Swiss graphic design and the associated typography that achieved international fame in the 1950s and 1960s. Swiss poster art was particularly popular at that time. But beyond posters, Swiss Design is also associated with the formation of new principles of graphic design in the middle of the 20th century. It is believed that many elements of computer design were influenced by Swiss Style.

I like the idea that it kept my minimalism idea with a design element that is supposed to make it look purposeful. I created more pages than required because I was not paying attention to the requirements and instead pulled from the notes.

---

## WordPress Theme Structure and Architecture

Wordpress is interestingly split apart into disparate entities for what i thought it would be. The idea is that the Styles and the Index are really the only important things to be looked at here, everything else is gravy. So, required files would be styles.css and index.php; with those required files the site can respond 100% of the time, if not ugly-looking.

When someone visits a URL on my site, Wordpress runs through a quick `if_exists()` that helps it establish if a template file exists for a specific type of content, starting from the most specific and working for the most general; much like a coin slot machine, you put a quarter in and it will not fall into the hole the size of a dime. For a single post it checks: does `single-post-{###}.php` exist? No? Does archive? Yeah? Use it!

If nothing exists, it falls back to index. But honestly, that's probably a problem.

`style.css` has the different bits that have to "tie together" into one. `functions.php` loads on every page request BEFORE any template. `header.php` and `footer.php` are considered "fragments" in PHP (modularity!) which means we can apply them at will with `get_header()` and `get_footer()`. If you've only ever worked with HTML raw you can start to understand why they wrote PHP like this versus other "Modern" languages, as I started coding with bash and Python 2; it makes PHP feel backwards until you look at just writing raw HTML and how that kind of sucks.

Together, all these files form a system where layout pieces are reused across pages, making it less likely for a mislabeled thing, or poorly updated field.

---

## The Loop

The structure of the code for the loop has so far (and from what i've read thus far) been the same across the board:
```php
if ( have_posts() ) : while ( have_posts() ) : the_post();
    // do stuff
endwhile; endif;
```

This establishes if there are any posts at all as `have_posts()` will return true if there are posts, while `have_posts()` keeps it going as long as there are posts. `the_post()` is just the data that then displays title, content, date, author, into a set of global variables that the template tags read from, and can dynamically build what is necessary to get it going. 

Fascinatingly, there are some that start with `the_` and some `get_the_` - the difference being one shows output directly, basically calls a print function (BASICALLY, IT'S NOT ACTUAL) and `get_the_` is how you can get the data to be able to use elsewhere. There are others, like `_title`, `_content`, and `_excerpt` which can get some of the more specific parts to be called down, and the get_the/the structure applies past just `the_post()`

And to make sure that i'm mentioning these properly:
1. we have `_title` which will output the post title either to the page (`the_`) or to a variable (`get_the_`).
2. We have `the_post_thumbnail()` which gets exactly what you think it does, a summary of the page from a Local AI. Kidding, it outputs the featured image of the post onto the page. This one pairs with `has_post_thumbnail()` as a check first, since not every post has one, and you don't want an empty image container showing up.
3. and we have `_author` which shows author data, again to the page or to a variable depending on set.
