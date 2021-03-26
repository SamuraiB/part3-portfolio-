<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php print @$this->title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="app/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="app/css/jquery.miniColors.css" rel="stylesheet">
    <link href="app/css/app.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px;
        }
    </style>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script language="javascript">
        var presets = {
        <?php
        foreach ($this->presets as $preset => $preset_item)
        {
            echo "'" . $preset . "'" . " : {";
            foreach ($preset_item as $key => $val)
            {
                echo "'" . $key . "'" . " : " . "'" . $val . "', \n    ";
            }
            echo "},\n";
        }
        ?>
        };
    </script>
    <style>
<?php
foreach ($this->presets as $preset => $preset_item)
{
echo "#preset_" . $preset . "{\n";
            ?>
            background: <?php echo @$preset_item['presentation_gradient-start'] ?>;
            background: -moz-linear-gradient(top, <?php echo @$preset_item['presentation_gradient-start'] ?> 0%, <?php echo @$preset_item['presentation_gradient-end'] ?> 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php echo @$preset_item['presentation_gradient-start'] ?>), color-stop(100%,<?php echo @$preset_item['presentation_gradient-end'] ?>));
            background: -webkit-linear-gradient(top, <?php echo @$preset_item['presentation_gradient-start'] ?> 0%,<?php echo @$preset_item['presentation_gradient-end'] ?> 100%);
            background: -o-linear-gradient(top, <?php echo @$preset_item['presentation_gradient-start'] ?> 0%,<?php echo @$preset_item['presentation_gradient-end'] ?> 100%);
            background: -ms-linear-gradient(top, <?php echo @$preset_item['presentation_gradient-start'] ?> 0%,<?php echo @$preset_item['presentation_gradient-end'] ?> 100%);
            background: linear-gradient(to bottom, <?php echo @$preset_item['presentation_gradient-start'] ?> 0%,<?php echo @$preset_item['presentation_gradient-end'] ?> 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo @$preset_item['presentation_gradient-start'] ?>', endColorstr='<?php echo @$preset_item['presentation_gradient-end'] ?>',GradientType=0 );
            border-left:1px solid <?php echo @$preset_item['presentation_gradient-start'] ?>;
            border-top:1px solid <?php echo @$preset_item['presentation_gradient-start'] ?>;
            border-bottom:1px solid <?php echo @$preset_item['presentation_gradient-end'] ?>;
            border-right:1px solid <?php echo @$preset_item['presentation_gradient-end'] ?>;

            <?php
            echo "}\n";
}
?>
    };
    </style>
</head>

<body data-spy="scroll" data-target=".subnav" data-offset="50">

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="#"><?php print @$this->title; ?></a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li class="active"><a href="#">Home</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container">

    <!-- Masthead
   ================================================== -->
    <header class="jumbotron subhead" id="overview">
        <h1><?php echo $this->title; ?> <small><?php echo $this->settings; ?></small></h1>
        <p class="lead"><?php echo $this->product['slogan']; ?></p>

        <div id="messages"></div>

        <?php if (!$this->is_writable_settings) { ?>
        <div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Unfortunately, your settings file <span class="label">site.settings.php</span> is not writable. The <?php echo $this->title; ?> configuration interface writes into this file whenever you save your settings. Please change the permissions for this file, which is located in your theme's root folder, in order to be able to save your settings.
        </div>
        <?php } ?>

        <?php if (!$this->is_writable_css) { ?>
        <div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Unfortunately, <?php echo $this->title; ?>'s main CSS file <span class="label">styles.css</span> is not writable. The <?php echo $this->title; ?> configuration interface writes into this file whenever you save your settings. Please change the permissions for this file, which is located in your theme's CSS folder, just underneath the root folder.
        </div>
        <?php } ?>


        <div class="subnav">
            <ul class="nav nav-pills">
                <?php
                    $x=0;
                    foreach($this->groups as $group => $contents)
                    {
                        echo '<li><a href="#'.@$contents['id'].'" title="'.@$contents['desc'].'">'.$group.'</a></li>';
                    }
                ?>
                       <li><a href="#support">Support</a></li>
            </ul>
        </div>
    </header>


    <section id="settings">
        <form id="all_settings" name="all_settings" action="index.php" method="post">
        <input type="hidden" name="internal_type" value="settings">
        <?php
        foreach($this->groups as $group => $contents)
        {
        ?>
            <section id="<?php echo @$contents['id']; ?>">
              <div class="page-header">
                  <h1><?php echo $group; ?> <small><?php echo @$contents['desc']; ?></small></h1>
              </div>
              <div class="row container">
                  <?php
                  foreach($contents['items'] as $this_item => $content)
                  {
                  ?>

                  <?php if ($content['type'] != "presets") { ?>
                      <section class="well" class="config_section">
                          <label><?php echo $this_item; ?></label>
                          <p><small><?php echo @$content['desc']; ?></small></p>
                          <div class="config_item">
                            <?php
                             include('app/templates/element_' . $content['type'] . '.tpl.php');
                            ?>
                          </div>
                      </section>
                      <?php } else { ?>
                      <section class="config_section">
                          <div class="config_item">
                              <?php
                              include('app/templates/element_' . $content['type'] . '.tpl.php');
                              ?>
                          </div>
                      </section>
                  <?php } ?>

                  <?php
                  }
                  ?>
              </div>
            </section>
            <?php
        }
        ?>


            <section id="support">
                <div class="page-header">
                    <h1><?php echo $this->title; ?> <small>Support</small></h1>
                </div>
                <div class="row container">
                    <p><?php echo $this->title; ?> Version <?php echo $this->product['version']; ?> by <a href="http://www.shapingrain.com">Shaping Rain</a>.</p>
                    <p>We are located in Europe and North America, and we are dedicated to providing you with the best technical support possible.</p>
                    <p>We provide <em>free lifetime updates</em> and <em>free lifetime support</em> for all our products.* If there is anything we can help you with, please let us know. Whether you have discovered a problem or need help customizing a product to fit your needs, we are always happy to help out and point you into the right direction.</p>
                    <p><small>* Lifetime support is limited to customers who have legitimately obtained a copy of the product. Proof of purchase may be required.</small></p>
                    <p>Please direct all your support questions to <a href="mailto:support@shapingrain.com">support@shapingrain.com</a>.</p>
                </div>
            </section>


        </form>
    </section>

</div> <!-- /container -->
<div class="navbar navbar-saveall navbar-fixed-bottom">
    <div class="navbar-inner">
        <div class="container">
            <a href="javascript:saveAll();" class="btn btn-success pull-right"><strong>Save all changes</strong></a>
         </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="app/bootstrap/js/bootstrap.min.js"></script>
<script src="app/js/jquery.miniColors.min.js"></script>
<script src="app/js/app.js"></script>

</body>
</html>