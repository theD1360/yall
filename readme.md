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

More info soon...

### set_global($name, $val, $encode = FALSE)

More info soon...

### partial($name, $view, $data = array())

More info soon...

### render($layout = '', $return = FALSE)

More info soon...