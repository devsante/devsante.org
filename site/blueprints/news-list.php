<?php if(!defined('KIRBY')) exit ?>

title: Actualités
files: false
pages:
  template: news
  sort: flip
  num:
    mode: date
    field: datetime
    format: %Y%m%d%H%I
options:
  preview: false
  status: false
  template: false
  url: false