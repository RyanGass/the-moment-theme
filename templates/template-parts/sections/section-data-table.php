<?php 

global $section;
$use_bg_image = $section['use_background_image'];
$bg_image = 'style="background-image: url(' . $section['data_table_bg_image'] . ');"';
$use_bg_color = $section['use_background_color'];
$bg_color = $section['background_color'];
if ($use_bg_color === 'yes') { $bg_color = ' bg-[' . $bg_color . ']'; } else { $bg_color = '';};
$table_heading_rows = $section['table_heading'];
$table_data_rows = $section['table_data'];
$bottom_content = $section['bottom_content'];
?>

<section id="data-table-container" class="w-full<?php echo $bg_color; ?>" <?php echo $bg_image; ?>>
    <div class="container-inner">
        <div id="section-heading" class="section-image">
            <h2 class="section-title"><?php echo $section['heading']; ?></h2>
            <?php if ($section['content']) : ?>
            <div class="section-text"><?php echo apply_filters( 'the_content', $section['content'] ) ?></div>
            <?php endif; ?>    
        </div>
        <div id="section-table">
            <table>
                <tbody>
                    <?php foreach ( $table_heading_rows as $table_heading_row ) { ?>
                        <tr>
                            <?php 
                            $table_heading_items = $table_heading_row['table_heading_items'];
                            ?>
                            <?php foreach ( $table_heading_items as $table_heading_item ) { ?>
                            <th class="row-item"><?php echo $table_heading_item['item']; ?></th>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    <?php foreach ( $table_data_rows as $table_data_row ) { ?>
                        <tr>
                            <?php 
                            $table_data_items = $table_data_row['table_data_items'];
                            ?>
                            <?php foreach ( $table_data_items as $table_data_item ) { ?>
                            <td class="row-item"><?php echo $table_data_item['item']; ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="bottom-content">
            <?php echo $bottom_content; ?>
        </div>
    </div>
</section>