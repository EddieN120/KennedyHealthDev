Twig 7 Theme
A base Twig theme for Drupal 7

This theme is bare bones by design. Don't use this theme unless you are willing
to get your hands dirty with CSS and templates.

Installation instructions

1. Download TFD (https://github.com/TFD7/TFD7) to sites/all/libraries/TFD
2. Download twig (http://twig.sensiolabs.org) to libraries/twig
3. Download and enable xautoload module (https://www.drupal.org/project/xautoload)
4. Download and enable libraries API module (https://www.drupal.org/project/libraries)
5. Move libraries/TFD/engines/twig/twig.engine to themes/engines/twig/

For more information on TFD (the Twig For Drupal template engine),
see: http://tfd7.rocks/

Theme Building
IMPORTANT NOTE: The Twig 7 Theme is an abstract base theme. If you make it your
default theme, you will get errors. The instead, create a child theme:

1. Create a new directory under sites/all/themes with an appropriate name for
your theme.
Note: the directory name should contain only numbers, lowercase letters and
underscores (_). No spaces.

2. Copy the contents of sites/all/themes/twig_7_theme/TWIG7_CHILD to the directory
you just created.

3. Rename sites/all/themes/your_theme_name/TWIG7_CHILD.info to
sites/all/themes/your_theme_name/your_theme_name.info (the name of the info file
and the name of the directory must be the same)

4. Edit your_theme_name.info. Change "name = Child theme for Twig7" to
"name = Whatever you want to call it", and save your changes. The name you enter
here will appear in your list of themes on the Appearance page.

6. Enable your new child theme.

Tips on Creating Child Themes
The Twig 7 theme makes extensive use of blocks to simplify the creation of child
theme. With the standard PHPTemplate, if you wanted to modify page.tpl.php in
your child theme, you would have to copy the template to your child theme and
make your changes to it. With the Twig 7 theme, you create a new page.tpl.twig
file in your child theme and extend the base template, like this:

{% extends "twig_7_theme::page/page.tpl.twig" %}
{% block title %}{% endblock %}
{% block footer %}
        <footer id="page-footer" class="page-footer">
            {{ page.footer }}
            <div class="credit">Website by My Company</div>
        </footer>
{% endblock %}

This will create a default page template with no node title and a credit div added
to the footer.

Debugging
You can inspect template variables by adding
{{ var_name|dump }}
to the template where var_name is the name of the variable you want to inspect.
If you have the devel module enabled, use
{{ var_name|dump("dpm") }}
to get the equivalent of dpm($var_name);


If you want to view all available template variables, use
{{ _context|dump }}
or
{{ _context|dump("dpm") }}
