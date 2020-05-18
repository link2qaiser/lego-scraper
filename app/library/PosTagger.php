<?php 
/*
ALL POS CODE DESCRIBE IN WEKIPEDIA
*/
//https://en.wikipedia.org/wiki/Brown_Corpus#Part-of-speech_tags_used
namespace App\library;
class PosTagger {
        private $dict; 
        
        public function __construct($lexicon) {
                $fh = fopen($lexicon, 'r');
                while($line = fgets($fh)) {
                        $tags = explode(' ', $line);
                        $this->dict[strtolower(array_shift($tags))] = $tags;
                }
                fclose($fh);
        }
        
        public function tag($text) {
                preg_match_all("/[\w\d\.]+/", $text, $matches);
                $nouns = array('NN', 'NNS');
                
                $return = array();
                $i = 0;
                foreach($matches[0] as $token) {
                        // default to a common noun
                        $return[$i] = array('token' => $token, 'tag' => 'NN');  
                        
                        // remove trailing full stops
                        if(substr($token, -1) == '.') {
                                $token = preg_replace('/\.+$/', '', $token);
                        }
                        
                        // get from dict if set
                        if(isset($this->dict[strtolower($token)])) {
                                $return[$i]['tag'] = $this->dict[strtolower($token)][0];
                        }       
                        
                        // Converts verbs after 'the' to nouns
                        if($i > 0) {
                                if($return[$i - 1]['tag'] == 'DT' && 
                                        in_array($return[$i]['tag'], 
                                                        array('VBD', 'VBP', 'VB'))) {
                                        $return[$i]['tag'] = 'NN';
                                }
                        }
                        
                        // Convert noun to number if . appears
                        if($return[$i]['tag'][0] == 'N' && strpos($token, '.') !== false) {
                                $return[$i]['tag'] = 'CD';
                        }
                        
                        // Convert noun to past particile if ends with 'ed'
                        if($return[$i]['tag'][0] == 'N' && substr($token, -2) == 'ed') {
                                $return[$i]['tag'] = 'VBN';
                        }
                        
                        // Anything that ends 'ly' is an adverb
                        if(substr($token, -2) == 'ly') {
                                $return[$i]['tag'] = 'RB';
                        }
                        
                        // Common noun to adjective if it ends with al
                        if(in_array($return[$i]['tag'], $nouns) 
                                                && substr($token, -2) == 'al') {
                                $return[$i]['tag'] = 'JJ';
                        }
                        
                        // Noun to verb if the word before is 'would'
                        if($i > 0) {
                                if($return[$i]['tag'] == 'NN' 
                                        && strtolower($return[$i-1]['token']) == 'would') {
                                        $return[$i]['tag'] = 'VB';
                                }
                        }
                        
                        // Convert noun to plural if it ends with an s
                        if($return[$i]['tag'] == 'NN' && substr($token, -1) == 's') {
                                $return[$i]['tag'] = 'NNS';
                        }
                        
                        // Convert common noun to gerund
                        if(in_array($return[$i]['tag'], $nouns) 
                                        && substr($token, -3) == 'ing') {
                                $return[$i]['tag'] = 'VBG';
                        }
                        
                        // If we get noun noun, and the second can be a verb, convert to verb
                        if($i > 0) {
                                if(in_array($return[$i]['tag'], $nouns) 
                                                && in_array($return[$i-1]['tag'], $nouns) 
                                                && isset($this->dict[strtolower($token)])) {
                                        if(in_array('VBN', $this->dict[strtolower($token)])) {
                                                $return[$i]['tag'] = 'VBN';
                                        } else if(in_array('VBZ', 
                                                        $this->dict[strtolower($token)])) {
                                                $return[$i]['tag'] = 'VBZ';
                                        }
                                }
                        }
                        
                        $i++;
                }
                
                return $return;
        }
}
/*function printTag($tags) {
        foreach($tags as $t) {
                echo $t['token'] . "/" . $t['tag'] .  " ";
        }
        echo "\n";
}
$tagger = new PosTagger('lexicon.txt');
//$tags = $tagger->tag('The quick brown fox jumped over the lazy dog');
$sql = "Michael Phelps waggled four fingers, recognizing another historic achievement.

Now, he's the first swimmer ever to win the same event at four straight Olympics.

Ryan Lochte was left in his wake every time.

In what was billed as the final showdown between two of America's greatest swimmers, Phelps blew away Lochte — and everyone else — to win his fourth gold medal of the Rio Olympics and 22nd overall with a victory in the 200-meter individual medley Thursday night.

Phelps finished a full body-length ahead of the field with total dominance on the breaststroke and freestyle legs, finishing in 1 minute, 54.66 seconds.

Lochte didn't even make it to the podium this time, after taking two silvers and a bronze behind Phelps at the last three Olympics in this event. Leading at the midway point, Lochte faded to fifth.

Japan's Kosuke Hagino took the silver, while China's Wang Shun claimed the bronze.

But Phelps was in a league of his own.

As usual.

He's got one more individual event at what he insists will really be his final Olympics — remember, he already retired once — and will be looking to add a fourth straight gold in the 100 butterfly to his staggering resume.

Then, he'll close out these Olympics in the 4x100 medley relay.

There seems to be little doubt he'll go six-for-six.

Led by Phelps, it was quite a night for the powerful American team, which picked up two more golds when Ryan Murphy completed a sweep of the men's backstroke events in the 200 and Simone Manuel tied 16-year-old Canadian for the top spot in the 100 freestyle, stunning world-record holder Cate Campbell of Australia. With the win, Manuel became the first African-American woman to win gold in swimming.

Campbell and her younger sister, Bronte, were hoping to battle for gold after teaming up to lead Australia to a victory in the 4x100 free relay.

Neither one of them made the podium by themselves. Cate was under her own world-record pace at the turn, but had nothing coming back and fell all the way to sixth. Bronte was second at the turn and slid to fourth at the finish.

Murphy extended red-white-and-blue dominance of the backstroke events that goes back to 1992.

The Barcelona Games were the last time the United States lost a men's final in those events.

Three days after winning the 100 back, Murphy touched first again in 1:53.62.

Murphy became the third American man in the last five Olympics to take both races. Aaron Peirsol pulled off the sweep at Athens in 2004, while Lenny Krayzelburg claimed both golds at the 2000 Sydney Games.

Australia's Mitch Larkin grabbed the silver in 1:53.96, just ahead of Russia's Evgeny Rylov with the bronze in 1:53.97.

The Olympics came to an end for another U.S. backstroke champion.

Missy Franklin finished 14th in the semifinals of the women's 200 back — beating out only two other swimmers. It was a far cry from the London Games, where \"Missy The Missile\" became only the second American woman to take four gold medals in a single Olympics.

This time, she was limited to a single gold, which came for swimming the preliminaries of the 4x200 freestyle relay. Franklin failed to even make it to the final of her two individual events.

In the only non-American victory of the night, Rie Kaneto of Japan pulled away from Yulia Efimova to take gold in the women's 200 breaststroke.

Kaneto grabbed the lead on the third of four laps and powered to the finish comfortably in front. The winning time was 2:20.30.

Efimova was 1.67 seconds behind, leaving the Russian with another silver medal. She also finished second to American Lilly King in the 100 breaststroke after initially being banned from the Rio Games for her links to the Russian doping scandal.

China's Shi Jinglin took the bronze in 2:28.28.

Australia's Taylor McKeown was top qualifier in the semifinals and grabbed the early lead.";
echo $sql."<br/>";
$tags = $tagger->tag($sql);
printTag($tags); */
?>
