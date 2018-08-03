<?php
$this->setTitle('WeDeTo - The Web Development Toolkit');
include tpl('parts/header.php');
include tpl('parts/page_start');
?>
                <h1 class="editor">Database access</h1>
                <p class="editor">
                    Wedeto comes with a database layer that currently supports
                    MySQL and PostgreSQL (we strongly recommend PostgreSQL if you
                    have the choice).

                    After the setup in the setup script, the database will be ready for you to use. In your controlleer, you can use:
                    <code>$app->db</code> to obtain a database object. You can use this as a <a href="http://php.net/manual/en/book.pdo.php">PDO</a>
                    to prepare and execute queries. However, for most uses, the <abbr title="Data Access Object">DAO</abbr> class will be useful to
                    save you from writing the queries:
                </p>
                <pre><code>&lt;?php
class User extends Wedeto\DB\DAO
{
    protected static $table = "users";
}

$my_user = User::get(['id' =&gt; 13]);</code></pre>
                <p>
                    Easy, right? Just tell Wedeto what the name of your table is, and Wedeto will find out what your table looks like and generate the queries.
                </p>
                <p>
                    If things get more complex, you can also use the Query classes to generate database agnostic queries:
                </p>
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
                <p>
                    
                    The loop will loop over the retrieved users,
                    <code>$select->execute</code> will return a 
                    <a href="http://php.net/manual/en/class.pdostatement.php">PDOStatement</a>
                    that has been prepared and executed. You just need to fetch the results.
                </p>
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
<?php
require tpl('parts/page_end.php');
require tpl('parts/footer.php');
