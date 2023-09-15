<?php

return [
    'ossServer' => env('ALIOSS_SERVER', 'yue-bucket-a.oss-cn-beijing.aliyuncs.com'),                      // 外网
    'ossServerInternal' => env('ALIOSS_SERVERINTERNAL', 'yue-bucket-a.oss-cn-beijing-internal.aliyuncs.com'),      // 内网
    'AccessKeyId' => env('ALIOSS_KEYID', ),                     // key
    'AccessKeySecret' => env('ALIOSS_KEYSECRET', null),             // secret
    'BucketName' => env('ALIOSS_BUCKETNAME', null)                  // bucket
];
