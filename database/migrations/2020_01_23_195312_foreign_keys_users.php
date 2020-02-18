<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeysUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_project')->references('id_project')->on('wikis');
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->foreign('id_project')->references('id_project')->on('projects');
        });

        Schema::table('chats', function (Blueprint $table) {
            $table->foreign('owner')->references('id')->on('users');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_post')->references('id_post')->on('posts');
            $table->foreign('id_project')->references('id_project')->on('blogs');
        });

        Schema::table('companies', function (Blueprint $table) {
            $table->foreign('id_city')->references('id_city')->on('cities');
        });

        Schema::table('company_for_validations', function (Blueprint $table) {
            $table->foreign('id_city')->references('id_city')->on('cities');
        });

        Schema::table('company_users', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_company')->references('id_company')->on('companies');
        });

        Schema::table('dm_files', function (Blueprint $table) {
            $table->foreign('id_folder')->references('id_folder')->on('dm_folders');
        });

        Schema::table('dm_folders', function (Blueprint $table) {
            $table->foreign('id_document_manager')->references('id_manager')->on('document_managers');
        });

        Schema::table('document_managers', function (Blueprint $table) {
            $table->foreign('id_project')->references('id_project')->on('projects');
        });

        Schema::table('histories', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_article')->references('id_article')->on('articles');
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('id_chat')->references('id_chat')->on('chats');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_project')->references('id_project')->on('blogs');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->foreign('id_project')->references('id_proposal')->on('proposals');
        });

        Schema::table('proposal_tags', function (Blueprint $table) {
            $table->foreign('id_proposal')->references('id_proposal')->on('proposals');
            $table->foreign('id_tag')->references('id_tag')->on('tags');
        });

        Schema::table('resource_centers', function (Blueprint $table) {
            $table->foreign('id_project')->references('id_project')->on('projects');
        });

        Schema::table('schools', function (Blueprint $table) {
            $table->foreign('id_city')->references('id_city')->on('cities');
        });

        Schema::table('school_for_validations', function (Blueprint $table) {
            $table->foreign('id_city')->references('id_city')->on('cities');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('school_proposals', function (Blueprint $table) {
            $table->foreign('id_school')->references('id_school')->on('schools');
            $table->foreign('id_proposal')->references('id_proposal')->on('proposals');
        });

        Schema::table('school_users', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_school')->references('id_school')->on('schools');
        });

        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign('id_assigned_user')->references('id')->on('users');
            $table->foreign('id_author')->references('id')->on('users');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_city')->references('id_city')->on('cities');
            $table->foreign('id_role')->references('id_role')->on('roles');
        });

        Schema::table('user_projects', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_project')->references('id_project')->on('projects');
        });

        Schema::table('user_proposals', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_proposal')->references('id_proposal')->on('proposals');
        });

        Schema::table('wikis', function (Blueprint $table) {
            $table->foreign('id_project')->references('id_project')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {

            $table->dropForeign(['id_user']);
            $table->dropForeign(['id_project']);
        });

        Schema::table('blogs', function (Blueprint $table) {

            $table->dropForeign(['id_project']);
        });

        Schema::table('chats', function (Blueprint $table) {

            $table->dropForeign(['owner']);
        });

        Schema::table('comments', function (Blueprint $table) {

            $table->dropForeign(['id_user']);
            $table->dropForeign(['id_post']);
            $table->dropForeign(['id_project']);
        });

        Schema::table('companies', function (Blueprint $table) {

            $table->dropForeign(['id_city']);
        });

        Schema::table('company_for_validations', function (Blueprint $table) {

            $table->dropForeign(['id_city']);
        });

        Schema::table('company_users', function (Blueprint $table) {

            $table->dropForeign(['id_user']);
            $table->dropForeign(['id_company']);
        });

        Schema::table('dm_files', function (Blueprint $table) {
            $table->dropForeign(['id_folder']);
        });

        Schema::table('dm_folders', function (Blueprint $table) {
            $table->dropForeign(['id_document_manager']);
        });
        Schema::table('document_managers', function (Blueprint $table) {
            $table->dropForeign(['id_project']);
        });

        Schema::table('histories', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropForeign(['id_article']);
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['id_chat']);
            $table->dropForeign(['id_user']);
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropForeign(['id_project']);
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['id_project']);
        });

        Schema::table('proposal_tags', function (Blueprint $table) {
            $table->dropForeign(['id_proposal']);
            $table->dropForeign(['id_tag']);
        });

        Schema::table('resource_centers', function (Blueprint $table) {
            $table->dropForeign(['id_project']);
        });

        Schema::table('schools', function (Blueprint $table) {
            $table->dropForeign(['id_city']);
        });

        Schema::table('school_for_validations', function (Blueprint $table) {
            $table->dropForeign(['id_city']);
            $table->dropForeign(['id_user']);
        });

        Schema::table('school_proposals', function (Blueprint $table) {
            $table->dropForeign(['id_school']);
            $table->dropForeign(['id_proposal']);
        });

        Schema::table('school_users', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropForeign(['id_school']);
        });

        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign(['id_assigned_user']);
            $table->dropForeign(['id_author']);
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_city']);
            $table->dropForeign(['id_role']);
        });

        Schema::table('user_projects', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropForeign(['id_project']);
        });

        Schema::table('user_proposals', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropForeign(['id_proposal']);
        });

        Schema::table('wikis', function (Blueprint $table) {
            $table->dropForeign(['id_project']);
        });
    }
}
