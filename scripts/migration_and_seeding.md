# Migration and Seeding

``` sql
-- Migration

create table mahasiswa (

id SERIAL primary key,

nama VARCHAR(255) not null,

nim VARCHAR(255) not null

)

  

create table mata_kuliah (

id SERIAL primary key,

nama VARCHAR(255) not null,

deskripsi VARCHAR(255) not null

)

  

create table ruang_kuliah (

id SERIAL primary key,

nama VARCHAR(255) not null

)

  

create table dosen (

id SERIAL primary key,

nama VARCHAR(255) not null,

nip VARCHAR(255) not null

)

  

create table jadwal (

id SERIAL primary key,

id_mk INTEGER not null,

id_rk INTEGER not null,

id_dosen INTEGER not null,

tanggal_jam_mulai TIMESTAMP not null,

tanggal_jam_selesai TIMESTAMP not null,

constraint jadwal_id_mk_fkey foreign key (id_mk) references mata_kuliah (id) on update no action on delete set null,

constraint jadwal_id_rk_fkey foreign key (id_rk) references ruang_kuliah (id) on update no action on delete set null,

constraint jadwal_id_dosen_fkey foreign key (id_dosen) references dosen (id) on update no action on delete set null

)

  

create table peserta (

id_mhs INTEGER not null,

id_jadwal INTEGER not null,

constraint peserta_id_mhs_fkey foreign key (id_mhs) references mahasiswa (id) on update no action on delete set null,

constraint peserta_id_jadwal_fkey foreign key (id_jadwal) references jadwal (id) on update no action on delete set null,

primary key (id_mhs, id_jadwal)

)

  

-- Seeding

INSERT INTO dosen (nama, nip) VALUES

('Dr. Budi Santoso, S.Kom., M.T.', '19750101001'),

('Prof. Dr. Ir. Siti Aminah', '19680515002'),

('Rina Wijaya, M.Sc.', '19901224003')

  

INSERT INTO ruang_kuliah (nama) VALUES

('R. Teori 301'),

('Lab Komputer A'),

('R. Serbaguna')

  

INSERT INTO mata_kuliah (nama, deskripsi) VALUES

('Basis Data Lanjut', 'Mempelajari PostgreSQL, Tuning, dan Optimasi.'),

('Algoritma dan Struktur Data', 'Dasar-dasar pemrograman dan kompleksitas.'),

('Sistem Operasi', 'Konsep inti dan manajemen sumber daya sistem.')

  

INSERT INTO Mahasiswa (nama, nim) VALUES

('Andi Pratama', '202301001'),

('Citra Dewi', '202301002'),

('Bayu Kusuma', '202301003'),

('Dina Fitri', '202301004')

  

INSERT INTO jadwal (id_mk, id_rk, id_dosen, tanggal_jam_mulai, tanggal_jam_selesai) VALUES

(

(SELECT id FROM mata_kuliah mk WHERE nama = 'Basis Data Lanjut'),

(SELECT id FROM ruang_kuliah rk WHERE nama = 'Lab Komputer A'),

(SELECT id FROM dosen WHERE nip = '19750101001'),

'2025-11-20 10:00:00+07',

'2025-11-20 12:00:00+07'

)

  

INSERT INTO jadwal (id_mk, id_rk, id_dosen, tanggal_jam_mulai, tanggal_jam_selesai) VALUES

(

(SELECT id FROM mata_kuliah mk WHERE nama = 'Algoritma dan Struktur Data'),

(SELECT id FROM ruang_kuliah rk WHERE nama = 'R. Teori 301'),

(SELECT id FROM dosen WHERE nip = '19901224003'),

'2025-11-21 08:30:00+07',

'2025-11-21 10:00:00+07'

)

  

INSERT INTO peserta (id_mhs, id_jadwal) VALUES

(

(SELECT id FROM mahasiswa WHERE nim = '202301001'),

(SELECT id FROM jadwal WHERE id_mk = (SELECT id FROM mata_kuliah mk WHERE nama = 'Algoritma dan Struktur Data'))

),

(

(SELECT id FROM mahasiswa WHERE nim = '202301002'),

(SELECT id FROM jadwal WHERE id_mk = (SELECT id FROM mata_kuliah mk WHERE nama = 'Algoritma dan Struktur Data'))

),

(

(SELECT id FROM mahasiswa WHERE nim = '202301003'),

(SELECT id FROM jadwal WHERE id_mk = (SELECT id FROM mata_kuliah mk WHERE nama = 'Algoritma dan Struktur Data'))

);

  

INSERT INTO peserta (id_mhs, id_jadwal) VALUES

(

(SELECT id FROM mahasiswa WHERE nim = '202301004'),

(SELECT id FROM jadwal WHERE id_mk = (SELECT id FROM mata_kuliah mk WHERE nama = 'Basis Data Lanjut'))

);
```