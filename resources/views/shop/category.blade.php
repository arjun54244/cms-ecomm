@extends('layout.app')

@section('title', $category->meta_title ?? $category->name)

@section('meta_description', $category->meta_description)

@section('meta_keywords', $category->meta_keywords)
@section('content')

@endsection