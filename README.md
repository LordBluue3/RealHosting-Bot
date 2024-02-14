![bot](https://github.com/LordBluue3/RealHosting-Bot/assets/58037508/ba3b042c-c44e-4b8a-ae4a-b0aacb0900ed)


<h1>RealHosting BOT</h1>

Discord BOT made in PHP, to moderate your discord server.


<h1>install PHP dependencies</h1>

```bash
composer install
```

<h1>config your dotenv</h1>

![image](https://github.com/LordBluue3/RealHosting-Bot/assets/58037508/af3d6285-727b-4e72-aa1c-1ca1cf4299fd)


<h1>run the migrations</h1>

```bash
cd src
cd database
php RunMigrations.php
```

<h1>start bot</h1>

```bash
php index.php
```

<h1>I'm using the Rector PHP to refactor the code</h1>
<h4>To see preview of suggested changed</h4>

```bash
vendor/bin/rector process --dry-run
```

<h4>To make changes happen, run bare command</h4>

```bash
vendor/bin/rector process
```
