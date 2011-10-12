# AK Layout - A simple view layout library for CodeIgniter

## Installation

1. Download or `git clone` the files into `application/third_party/ak_layout/`.
2. Set your default layout in `application/third_party/config/ak_layout.php`.
  * Default is `layouts/default`.
  * Depending on what you set, make sure that the files actually exist in your `application/views/` directory. For example, `layouts/default` maps to `application/views/layouts/default.php`.
3. Do the following in `application/config/autoload.php`:
  * Add `APPPATH.'third_party/ak_layout'` to the `$autoload['packages']` array.
  * Add `'ak_layout'` to the `$autoload['libraries']` array.

## Usage

### set($name, $val, $encode = FALSE)

Set a variable to be used in the layout. Setting `$encode = TRUE` will pass the value through `htmlentities()`.

Example: `$this->ak_layout->set('title', 'My Page Title');`

### set_global($name, $val, $encode = FALSE)

Set a variable to be used in the layout **and** partials. Setting `$encode = TRUE` will pass the value through `htmlentities()`.

Example: `$this->ak_layout->set_global('username', 'admin');`

### partial($name, $view, $data = array())

Set a view to be used in the layout as a partial. `$data` is an array of variables to be sent to the view being called.

Example: `$this->ak_layout->partial('main_content', 'users/login');`

### render($layout = '', $return = FALSE)

Renders and outputs the layout. You can override the default layout by setting the `$layout` parameter. If you want to return the rendered view, set `$return = TRUE`.

Example: `$this->ak_layout->render();`

## Other Fun Stuff

Be one of the cool kids and use method chaining:

```php
$this->ak_layout->set('title', 'My Title')
    ->set('meta_description', 'Yay for SEO!', TRUE)
    ->set_global('my_var', 'I will be available in partials, too!')
    ->partial('main_content', 'pages/about', array('foo' => 'bar'))
    ->render();
```