<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Magebit homework || LIST || Kristaps Zaķis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" media="all" href="/assets/css/result.css" />
</head>
<body>

<h2>Email list</h2>

<?php if (empty($data['records'])):?>
    <h3>There is no emails matching</h3>
    <?php if (sizeof($_GET) > 1): ?>
        <div>
            <a href="/subscriptions" class="reset">Reset</a>
        </div>
    <?php endif;
else:
    $sortOrder = 0;
    $isActive = false;

    $searchString = '';

    if (isset($_GET['search'])):
        $searchString = $_GET['search'];
    endif;

    if (isset($_GET['sortby'])):
        $sortOrder =  $_GET['sortby'];

        $isActive = true;
    endif; ?>

    <form name="filter" action="/subscriptions">
        <select name="sortby">
            <option name="time" value="0" <?= $sortOrder === "0" ? 'selected' : ''; ?>>Date</option>
            <option name="email" value="1" <?= $sortOrder === "1" ? 'selected' : ''; ?>>Email</option>
        </select>

        <div>
            <input type="text" value="<?= $searchString; ?>" name="search" /> Search email
        </div>

        <?php if (isset($_GET['filter-by-type'])):
            $isActive = true; ?>

            <input name="filter-by-type" type="hidden" value="<?= $_GET['filter-by-type']; ?>" />
        <?php else: ?>
            <div class="email-types">
                <?php foreach ($data['types'] as $type):
                    echo '<button name="filter-by-type" value="' . $type . '">' . $type . '</button>';
                endforeach; ?>
            </div>
        <?php endif; ?>

        <button type="submit">Sort by & filter</button>

        <?php if ($isActive): ?>
          <div>
              <a href="/subscriptions" class="reset">Reset</a>
          </div>
        <?php endif; ?>
    </form>
    <form name="deleteMultiples" action="/subscriptions/deleteMultiples">
        <button type="submit">Delete multiples</button>

    <ul>
        <?php foreach ($data['records'] as $email):
            $values = (array) $email; ?>

            <li>
                <input type="checkbox" name="ids[]" value="<?= $values['id']; ?>"/>
                <a href="/subscriptions/delete/<?= $values['id']; ?>"
                   class="action">Delete</a>

                <span class="email"><?= $values['email']; ?></span>
                <span class="time">( <?= $values['timestamp']; ?>)</span>
            </li>
        <?php endforeach; ?>
    </ul>
    </form>
<?php endif; ?>

</body>
</html>
