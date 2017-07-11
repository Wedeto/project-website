<?php
$this->setTitle('WeDeTo - The Web Development Toolkit');
$submenu = [
    'Introduction' => '#intro',
    'Query Builder' => '#builder',
    'Foreach/else' => '#fee'
];

include tpl('parts/header.php');
include tpl('parts/page_start');
?>
                <section id="intro" data-magellan-target="intro">
                    <h1>Database access</h1>
                    <p>
                        Wedeto comes with a database layer that currently supports
                        MySQL and PostgreSQL (we strongly recommend PostgreSQL if you
                        have the choice).

                        After the setup in the setup script, the database will be ready for you to use. In your controlleer, you can use:
                        <code>$app->db</code> to obtain a database object. You can use this as a <a href="http://php.net/manual/en/book.pdo.php">PDO</a>
                        to prepare and execute queries. However, for most uses, the <abbr title="Data Access Object">DAO</abbr> class will be useful to
                        save you from writing the queries:

                        <pre><code>&lt;?php
class User extends Wedeto\DB\DAO
{
    protected static $table = "users";
}

$my_user = User::get(['id' => 13]);</code></pre>

                        Easy, right? Just tell Wedeto what the name of your table is, and Wedeto will find out what your table looks like and generate the queries.
                    </p>
                </section>
                <section id="builder" data-magellan-target="builder">
                    <h2>Query builder</h2>
                    <p>
                        If things get more complex, you can also use the Query classes to generate database agnostic queries:

                        <pre><code>&lt;?php
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
}</code></pre>
                    
                        The loop will loop over the retrieved users,
                        <code>$select->execute</code> will return a 
                        <a href="http://php.net/manual/en/class.pdostatement.php">PDOStatement</a>
                        that has been prepared and executed. You just need to fetch the results.
                    </p>
                </section>
                <section id="fee" data-magellan-target="fee">
                    <h2>Foreach/else</h2>
                    <p>
                        A common scenario in a template is that you want to list all objects, and show a message when there is none.
                        This structure is sometimes referred to as foreach-else. Wedeto implements this in a function fee:
                        <pre><code>&lt;?php
use Wedeto\Util\Functions as WF;

WF::fee($users, function ($user) {
    // Do something with the users
}, function () {
    // Do something when there are no users
});</code></pre>
                    </p>
                </section>
<?php
require tpl('parts/page_end.php');
require tpl('parts/footer.php');
