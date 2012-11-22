<div>
    <div>
        <?php echo $question ?>
    </div>

    <div>
        <?php $options_array = explode('|', $question); ?>
        <ul>
            <?php for ($i = 0; $i < count($options_array); $i++): ?>
                <li><?php echo $options_array[$i]; ?></li>
            <?php endfor; ?>
        </ul>
    </div>
</div>