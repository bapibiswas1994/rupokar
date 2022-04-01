<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
	use HasSlug;
	protected $fillable = [
		'parent_id',
		'title',
		'slug',
		'short_desc',
		'long_desc',
		'image',
		'meta_key',
		'meta_desc',
		'status'		
	];
	/**
	 * Get the options for generating the slug.
	 */
	public function getSlugOptions(): SlugOptions
	{
		return SlugOptions::create()
			->generateSlugsFrom('title')
			->saveSlugsTo('slug');
	}



	public function parent()
	{
		return $this->belongsTo('App\Category', 'parent_id');
	}

	public function children()
	{
		return $this->hasMany('App\Category', 'parent_id');
	}
}
