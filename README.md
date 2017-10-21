# PHP Bootstrap 3 Helper

[![Total Downloads](https://img.shields.io/packagist/dt/phpbs/bs3.svg)](https://packagist.org/packages/phpbs/bs3)
[![Latest Stable Version](https://img.shields.io/packagist/v/phpbs/bs3.svg)](https://packagist.org/packages/phpbs/bs3)


## Installation

Install the latest version with composer

```bash
composer require phpbs/bs3
```

or just include/require the `src/bs3_helper.php` file in your code.

## Basic Example

```php
<?= table(
	['ID', 'Title', 'Actions'],
	[
		[1, 'Post 1', btn(icon('pencil'), ['sm'], ['href' => '/posts/1/edit']) . btn_danger(icon('times'))],
		[2, 'Post 2', btn(icon('pencil'), ['sm'], ['href' => '/posts/2/edit']) . btn_danger(icon('times'))]
	],
	['bordered', 'hover', 'striped'],
	[pagination(2, 20) => ['colspan' => 3, 'class' => 'text-center']],
	['id' => 'posts-table']
) ?>
```

```html
<table class="table table-bordered table-hover table-striped" id="posts-table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>Post 1</td>
			<td>
				<a class="btn btn-default btn-sm" href="/posts/1/edit">
					<i class="glyphicon glyphicon-pecil"></i>
				</a>
				<button class="btn btn-danger" type="button">
					<i class="glyphicon glyphicon-times"></i>
				</button>
			</td>
		</tr>
		<tr>
			<td>2</td>
			<td>Post 2</td>
			<td>
				<a class="btn btn-default btn-sm" href="/posts/2/edit">
					<i class="glyphicon glyphicon-pecil"></i>
				</a>
				<button class="btn btn-danger" type="button">
					<i class="glyphicon glyphicon-times"></i>
				</button>
			</td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<td class="text-center" colspan="3">
				<ul class="pagination">
					<li class="active"><a>1</a></li>
					<li><a href="/posts?page=2">2</a></li>
					<li><a href="/posts?page=3">3</a></li>
					<li><a href="/posts?page=4">4</a></li>
					<li><a href="/posts?page=2"><span aria-hidden="true">&raquo;</span></a></li>
					<li><a href="/posts?page=10">Last</a></li>
				</ul>
			</td>
		</tr>
	</tfoot>
</table>
```

_* HTML output will not be indented._

## About

### Requirements

- PHP Bootstrap 3 Helper works with PHP 5.3+.

### Submitting bugs and feature requests

Bugs and feature request are tracked on [GitHub](https://github.com/phpbs/bs3/issues).

### Author

Natan Felles - <natanfelles@gmail.com> - <https://natanfelles.github.io>

See also the list of [contributors](https://github.com/phpbs/bs3/contributors) which participated in this project.

### License

PHP Bootstrap 3 Helper is licensed under the MIT License - see the `LICENSE` file for details.
