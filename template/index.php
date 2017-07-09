<?php
$this->setTitle('WeDeTo - The Web Development Toolkit');
include tpl('parts/header.php');
$this->addCSS('wedeto');
$this->addJS('wedeto');
$this->addJS('vendor/google-code-prettify/prettify');
$this->addCSS('vendor/google-code-prettify/prettify');
?>
        <div class="large-2 medium-2 small-1 columns">
            <img src="<?=URL('assets/img/touch-icon-180.png');?>" style="width 100%;" />
        </div>
        <div class="large-10 medium-10 small-11 columns callout">
            <h1>Welcome</h1/>
            <p>
                Wedeto is a modern PHP framework that is built on new functionalities in PHP7.
                It is a reliable, thoroughly tested MVC-framework that allows you to build web applications quick and easy.
            </p>
            <h3>Installation is a breeze</h3>
            <p>
                Wedeto is built around <a href="https://getcomposer.org/">Composer</a> and is therefore easy to install.
                Just run the following commands:

                <pre>
composer require wedeto/application
php vendor/bin/setup.php
                </pre>

                This will install and setup Wedeto, while asking you some questions, and optionally configuring a database connection.
                Afterwards, you will end up with a http directory that should be served by your webserver.
                Of course, you will want to use a sercure, high-performance webserver for your production website. However,
                during development, the built-in PHP webserver may be useful.
                To try it out, just run:

                <pre>
php -S localhost:8000 http/index.php
                </pre>

                Now, point your browser to <a href="http://localhost:8000/">http://localhost:8000/</a> and you will be greeted by Wedeto.
            </p>
            <h3>Getting started</h3>
            <p>
                Of course, you will want to do more than serving a Wedeto greeter page. To add your own page, you will need to add
                apps (controllers) and templates (views).
            </p>
            <p>
                Wedeto doesn't use a router configuration. Instead, it uses the file system to route your request.
                Templates are stored in <strong>template</strong> directory of your Wedeto-root, and apps in <strong>app</strong>.
            </p>
            <p>
                Go ahead and create a controller:
                <pre>
mkdir app
echo "&lt;?php $tpl->setTemplate('test')->render();" &gt; app/test.php
                </pre>

                This very simple tiny controller does nothing else but define a route called test, and have that show the template called test.
                You can visit it: <a href="http://localhost:8000/test">http://localhost:8000/test</a>. Oops, an internal server error.
                After initial setup, Wedeto uses a development mode that shows you some background information. In this case, the template file is missing.
                That's right, we didn't create it yet. Let's do that now:

                <pre>
mkdir template
gedit template/test.php
                </pre>

                You can of course substitute your favorite editor for 'gedit'. Put in the following contents:

                <pre>
&lt;?php
$this-&gt;setTitle('WeDeTo - The Web Development Toolkit');
include tpl('parts/header.php');
?&gt;
        &lt;div class="small-12 columns callout"&gt;
            &lt;h1&gt;Hello World&lt;/h1&gt;
            &lt;p&gt;
                Behold your new custom template
            &lt;p&gt;
        &lt;/div&gt;
&lt;?
include tpl('parts/footer.php');
                </pre>

                Reload your page. You should now see the rendered template! As you can see, Wedeto uses PHP for its templates, rather
                than a templating engine. PHP is a templating engine itself, so why add another layer? Instead, Wedeto
                attempts to supply various utility functions that reduce the verbosity of several PHP functions that are often
                used in templates. For example, wrapping text in the <code>txt</code> function will escape it, like so: <code>txt('&lt;my text using &gt;');</code>.
                This is even better used with the short output tags in PHP, when outputting variables: <code>&lt;=txt($myvar)?&gt;</code>
            </p>
            <h3>Internationalization</h3>
                There are also functions for translating, such as <code>t('Translate me')</code>, <code>tn('Translate {amount} string', 'Translate {amount} strings', ['amount' => 3])</code>, ore <code>tl(['en' => 'Welcome', 'nl' => 'Welkom', 'de' => 'Wilkommen']);</code>. The last variant doesn't even require you to create gettext-files, so it's easy to get started on internationalization. When you scale up, it's probably more efficient to use the gettext-system to separate your translations from your layout. In all cases, Wedeto will determine the appropriate language based on the headers the visitor's browser sends. 
            </p>
            <h3>Combining parts</h3>
            <p>
                Now you've written your own app and template.
                Wedeto automatically scans and combines apps and templates from all installed modules.
                If you make a composer package out of your project and include it in another project,
                your controller will still be available in the new project. However, the new project
                can override it by defining its own controller with the same name.
            </p>
            <h3>Database access</h3>
            <p>
                Wedeto comes with a database layer that currently supports
                MySQL and PostgreSQL (we strongly recommend PostgreSQL if you
                have the choice).

                After the setup in the setup script, the database will be ready for you to use. In your controlleer, you can use:
                <code>$app->db</code> to obtain a database object. You can use this as a <a href="http://php.net/manual/en/book.pdo.php">PDO</a>
                to prepare and execute queries. However, for most uses, the <abbr title="Data Access Object">DAO</abbr> class will be useful to
                save you from writing the queries:

                <pre>
class User extends Wedeto\DB\DAO
{
    protected static $table = "users";
}

$my_user = User::get(['id' => 13]);
                </pre>

                Easy, right? Just tell Wedeto what the name of your table is, and Wedeto will find out what your table looks like and generate the queries.
            </p>
            <p>
                If things get more complex, you can also use the Query classes to generate database agnostic queries:

                <pre>
use Wedeto\DB\Query\Builder as QB;

$select = QB::select(
    QB::from('users'),
    QB::where(
        QB::any('id', [3, 5, 7, 9]),
    ),
    QB::limit(3);
);
foreach ($select->execute($db) as $user)
{
    // Do whatever you want
}
                </pre>
                
                The loop will loop over the retrieved users,
                <code>$select->execute</code> will return a 
                <a href="http://php.net/manual/en/class.pdostatement.php">PDOStatement</a>
                that has been prepared and executed. You just need to fetch the results.
            <p>
                A common scenario in a template is that you want to list all objects, and show a message when there is none.
                This structure is sometimes 
            </p>
            </p>
            <h3>That's it!</h3>
            <p>
                That's the basics of using Wedeto. Of course, there's a lot more to it. Wedeto includes
                a mailer, a database abstraction layer, various utility functions, formatting and escaping,
                and internationization. Documentation is still in the making. Check back soon for more information!
                Alternatively, if you can't wait, you can always check out the test suites coming with all the modules.
                Besides testing the code thoroughly, it also gives a good idea of how to use the software.
            </p>
        </div>
<?php
require tpl('parts/footer.php');
