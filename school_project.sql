PGDMP     (                    |            school_project    12.18    12.18     $           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            %           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            &           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            '           1262    16393    school_project    DATABASE     �   CREATE DATABASE school_project WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Portuguese_Brazil.1252' LC_CTYPE = 'Portuguese_Brazil.1252';
    DROP DATABASE school_project;
                postgres    false            �            1259    16464    classes    TABLE        CREATE TABLE public.classes (
    id integer NOT NULL,
    serie text,
    shift text,
    room text,
    vacancies integer
);
    DROP TABLE public.classes;
       public         heap    postgres    false            �            1259    16472    classes_id_seq    SEQUENCE     �   ALTER TABLE public.classes ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.classes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    206            �            1259    16476    student_in_class    TABLE     �   CREATE TABLE public.student_in_class (
    id integer NOT NULL,
    student_id integer NOT NULL,
    class_id integer NOT NULL,
    date date NOT NULL
);
 $   DROP TABLE public.student_in_class;
       public         heap    postgres    false            �            1259    16474    student_in_class_id_seq    SEQUENCE     �   ALTER TABLE public.student_in_class ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.student_in_class_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    209            �            1259    16394    students    TABLE     �   CREATE TABLE public.students (
    id integer NOT NULL,
    name text,
    date date,
    address text,
    responsible text,
    contact text
);
    DROP TABLE public.students;
       public         heap    postgres    false            �            1259    16404    students_id_seq    SEQUENCE     �   ALTER TABLE public.students ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.students_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    202            �            1259    16399    users    TABLE     i   CREATE TABLE public.users (
    id integer NOT NULL,
    name text,
    email text,
    password text
);
    DROP TABLE public.users;
       public         heap    postgres    false            �            1259    16406    users_id_seq    SEQUENCE     �   ALTER TABLE public.users ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    203                      0    16464    classes 
   TABLE DATA           D   COPY public.classes (id, serie, shift, room, vacancies) FROM stdin;
    public          postgres    false    206          !          0    16476    student_in_class 
   TABLE DATA           J   COPY public.student_in_class (id, student_id, class_id, date) FROM stdin;
    public          postgres    false    209   U                 0    16394    students 
   TABLE DATA           Q   COPY public.students (id, name, date, address, responsible, contact) FROM stdin;
    public          postgres    false    202   �                 0    16399    users 
   TABLE DATA           :   COPY public.users (id, name, email, password) FROM stdin;
    public          postgres    false    203          (           0    0    classes_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.classes_id_seq', 4, true);
          public          postgres    false    207            )           0    0    student_in_class_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.student_in_class_id_seq', 15, true);
          public          postgres    false    208            *           0    0    students_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.students_id_seq', 6, true);
          public          postgres    false    204            +           0    0    users_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.users_id_seq', 1, true);
          public          postgres    false    205            �
           2606    16471    classes classes_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.classes
    ADD CONSTRAINT classes_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.classes DROP CONSTRAINT classes_pkey;
       public            postgres    false    206            �
           2606    16480 &   student_in_class student_in_class_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.student_in_class
    ADD CONSTRAINT student_in_class_pkey PRIMARY KEY (id);
 P   ALTER TABLE ONLY public.student_in_class DROP CONSTRAINT student_in_class_pkey;
       public            postgres    false    209            �
           2606    16398    students students_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.students
    ADD CONSTRAINT students_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.students DROP CONSTRAINT students_pkey;
       public            postgres    false    202            �
           2606    16403    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    203               A   x�3�4TH����M��8��ӑ�Ĕ˘�,�X�����ii�e�i���,I�t�44����� �x      !   '   x�34�4A#]�24�4A1�4�4F����� �	7         e   x�3�tK-*J�,J�4202�50�54�L�/.��J�d�r��q�rz�^�Wi�S��sNbiJf�B@fnj^IjT����)L�W~f2��=... >�&�         P   x�3�t�I,M���L�����y%�9��鹉�9z����FF�I�fF�ɦ��@�I�����Q���I��W� �x     