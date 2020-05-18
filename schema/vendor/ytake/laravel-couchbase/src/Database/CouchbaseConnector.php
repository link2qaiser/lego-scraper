<?php

/**
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace Ytake\LaravelCouchbase\Database;

use CouchbaseCluster;

/**
 * Class CouchbaseConnector.
 *
 * @author Yuuki Takezawa<yuuki.takezawa@comnect.jp.net>
 */
class CouchbaseConnector implements Connectable
{
    /** @var string[] */
    protected $configure = [
        'host'     => '127.0.0.1',
        'user'     => '',
        'password' => '',
    ];

    /**
     * @param array $servers
     *
     * @return CouchbaseCluster
     */
    public function connect(array $servers)
    {
        $configure = array_merge($this->configure, $servers);

        return new CouchbaseCluster(
            $configure['host'],
            $configure['user'],
            $configure['password']
        );
    }
}
