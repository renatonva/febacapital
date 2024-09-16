<?php

$chaveSecreta = base64_encode(random_bytes(32));

return [
    'secret_key' => 'Mk1LuX4FLOEdV91zhlSozm24lyMcvpjS9eZzkS8kiXo=',
    'algorithms' => ['HS256']
];
?>
