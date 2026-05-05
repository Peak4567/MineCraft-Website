<?php


// -------------------- * ---------------------


if (!isset($_SESSION['uid']) || !isset($_SESSION['username'])) {
    include_once '_page/alertLogin.php';
} else {

    $player_win_item = array();
    $id = $connect->real_escape_string($_SESSION['uid']);
    $key = $connect->query("SELECT * FROM authme WHERE id = $id")->fetch_assoc();
    
    
    if(isset($_GET['buy_key'])) {
        if($key['points'] >= 50) {
            $update_key = $connect->query("UPDATE `authme` SET `points` = `points`-50 WHERE `authme`.`id` = $id;");
            $update__ = $connect->query("UPDATE `authme` SET `loot_key` = `loot_key`+1 WHERE `authme`.`id` = $id;");
            echo ('<script>window.location.href = "?page=gacha"</script>');
        } else {
            echo ('<script>
            swal("ไม่สามารถทำรายการได้", "พ้อยของคุณไม่เพียงพอ", "error", {
                button: "Reload",
            })
            .then((value) => {
                window.location.href = "?page=gacha"
            });
            </script>');
        }
    }
    
    $r_a = array();
    $item__ = $connect->query("SELECT * FROM loot");
    
    function getRandomWeightedElement(array $weightedValues)
    {
        $rand = mt_rand(1, (int) array_sum($weightedValues));
        // echo $rand;
    
        foreach ($weightedValues as $key => $value) {
            $rand -= $value;
            if ($rand <= 0) {
                return $key;
            }
        }
    }
    
    while ($result_ = $item__->fetch_assoc()) {
        $r_a[$result_['id']] = $result_['rate'];
    }
    
    $reward = getRandomWeightedElement($r_a);
    

    $item_ = $connect->query("SELECT * FROM loot");
    $result = $item_->fetch_all();
    $length = $item_->num_rows;


    foreach ($result as $win) {
        if ($win['0'] == $reward) {
            $player_win_item['name'] = $win['1'];
            $player_win_item['desc'] =  $win['2'];
            $player_win_item['cmd'] =  $win['3'];
            $player_win_item['img'] =  $win['4'];
            $player_win_item['tier'] =  $win['6'];
            $player_win_item['sv_id'] =  $win['7'];
        }
    }
?>

    <div class="container card border-0 shadow mb-4" id="loot-screen">
        <div class="card-body">
            <h5 class="m-0"><i class="fa fa-diamond"></i>&nbsp; สุ่ม Items กาชา</h5>
            <hr>
            <div class="grid-container text-center">
                <div style="background-color: #ddd; padding:1em; border-radius: 7px;">
                    <h5>มาลุ้นกันมีของรางวัลมากมาย</h5>
					<h5><img src="https://media.tenor.com/c5pbbJejcg8AAAAi/%E0%B8%A7%E0%B8%87%E0%B8%A5%E0%B9%89%E0%B8%AD-spinning-wheel.gif" alt="Wallet" style="width:25%"></h5>
                    <p class="col-sm-2 border mx-auto text-white" style="border-radius: 7px; background-color:#2F195F; padding:7px;">สิทธิ์ในการสุ่ม <?php echo $key['loot_key']; ?> ครั้ง</p>
                    <div>
                        <div class="container">
                            <div class="col">
                                <a class="btn btn-primary btn-block" href="?page=gacha&open=true">สุ่มไอเทม</a><br>
                            </div>
                            <div class="col">
                                <a class="btn btn-dark btn-block" href="?page=gacha&buy_key=true">ซื้อ 50 POINT</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <h5><p class="text-danger"> (คําเตือนอ่านก่อนสุ่ม) </p></h5>
					<p class="text-danger">* กรุณาออนไลน์ในเซิฟเวอร์ก่อนกดสุ่มทุกครั้ง !</p>
                </div>


                <div class="loot-track-container">
                    <?php if (isset($_GET['open'])) { ?>
                        <div class="loot-track">
                            <?php
                            for ($i = 0; $i <= 50; $i++) {
                                if ($i == 38) {
                                    if ($result[$reward - 1][6] == "Common") {
                                        $win_color = "background-color: #5FD068;";
                                    } else if ($result[$reward - 1][6] == "Rare") {
                                        $win_color = "background-color: #a335ee;";
                                    } else if ($result[$reward - 1][6] == "Legendary") {
                                        $win_color = "background-color: #ff8000;";
                                    }
                                    echo '
                                <div id="loot0" class="loot">
                                    <div style="', $win_color, '" class="loot-name">', $result[$reward - 1][6], ' <br/> ( ', $result[$reward - 1][1], ' )</div>
                                    <img class="loot-img" src="', $result[$reward - 1][4], '"/>
                                    <div class="loot-description">', $result[$reward - 1][2], '</div>
                                </div>
                            ';
                                } else {
                                    $value = rand(1, $length);
                                    if ($result[$value - 1][6] == "Common") {
                                        $color = "background-color: #5FD068;";
                                    } else if ($result[$value - 1][6] == "Rare") {
                                        $color = "background-color: #a335ee;";
                                    } else if ($result[$value - 1][6] == "Legendary") {
                                        $color = "background-color: #ff8000;";
                                    }
                                    echo '
                                <div id="loot0" class="loot">
                                    <div style="', $color, '" class="loot-name">', $result[$value - 1][6], ' <br/> ( ', $result[$value - 1][1], ' )</div>
                                    <img class="loot-img" src="', $result[$value - 1][4], '"/>
                                    <div class="loot-description">', $result[$value - 1][2], '</div>
                                </div>
                            ';
                                }
                            } ?>
                        </div>
                        <div class="win-line"></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script src="assets/js/TVCASc4rL9.js">
</script>

<script>
</script>
<!-- // lootImg.src = `img/${result.item}.png`; -->

<?php

echo "<br/>";


$rand = rand(-5530, -5670);

if (isset($_GET['open'])) {
    if ($_GET['open'] == true) {
        if ($key['loot_key'] > 0) {
            $update = $connect->query("UPDATE `authme` SET `loot_key` = `loot_key`-1 WHERE `authme`.`id` = $id;");
?>
            <script>
                const item_preview = <?php echo json_encode($player_win_item); ?>;
                Position('<?php echo $rand; ?>', item_preview);
            </script>
            
<?php
            $sv_id = $player_win_item['sv_id'];
            $rcon_server = $connect->query("SELECT * FROM `bungeecord` WHERE id = $sv_id")->fetch_assoc();
            $rcon_ip = $rcon_server['ip_server'];
            $rcon_port = $rcon_server['port'];
            $rcon_password = $rcon_server['password'];

            // echo $rcon_ip, $rcon_port;

            require_once('_system/Rcon/_rcon.php');

            $rcon = new Rcon($rcon_ip, $rcon_port, $rcon_password, '3');
            $command = str_replace("<player>", $_SESSION['realname'], $player_win_item['cmd']);
            if($rcon->connect()) {
                $rcon->sendCommand($command);
            }
        } else {
            echo ('<script>
		swal("ไม่สามารถทำรายการได้", "จำนวนกุญแจของคุณไม่พอ", "error", {
			button: "Reload",
		})
		.then((value) => {
			window.location.href = "?page=gacha"
		});
		</script>');
        }
    }
}


// echo ($rand);



?>
</script>