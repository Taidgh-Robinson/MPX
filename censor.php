<html>
   <body>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <h2 class="text-center"> Your censored text is: </h2>
      <div class="text-center">
         <?php
            function generateCensorArray($wordsAndPhrases)
            {
                $ret_val = "";
                $chars = str_split($wordsAndPhrases);
                $is_phrase = false;
                $phrases = [];
            
                foreach ($chars as $char) {
                    if (($char == " " || $char == ",") && !$is_phrase) {
                        array_push($phrases, strtolower($ret_val));
                        $ret_val = "";
                    } elseif (($char == "\"" || $char == "'") && !$is_phrase) {
                        $is_phrase = true;
                    } elseif (($char == "\"" || $char == "'") && $is_phrase) {
                        $is_phrase = false;
                        array_push($phrases, strtolower($ret_val));
                        $ret_val = "";
                    } else {
                        $ret_val .= $char;
                    }
                }
                return array_filter($phrases);
            }
            
            $censor = $_POST["phrases"];
            $doc = $_POST["document"];
            
            $ret = str_replace(generateCensorArray($censor), "XXXX", strtolower($doc));
            echo $ret;
            ?>
      </div>
   </body>
</html>