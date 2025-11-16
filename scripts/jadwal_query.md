SELECT
    j.id AS id_jadwal,
    mk.nama AS mata_kuliah,
    d.nama AS nama_dosen,
    rk.nama AS ruang_kuliah,
    j.tanggal_jam_mulai,
    j.tanggal_jam_selesai,
    m.nim AS nim_peserta,
    m.nama AS nama_peserta
FROM
    Jadwal j
INNER JOIN
    mata_kuliah mk ON j.id_mk = mk.id
INNER JOIN
    Dosen d ON j.id_dosen = d.id
INNER JOIN
    ruang_kuliah rk ON j.id_rk = rk.id
LEFT JOIN
    Peserta p ON j.id = p.id_jadwal
LEFT JOIN
    Mahasiswa m ON p.id_mhs = m.id
ORDER BY
    j.tanggal_jam_mulai, m.nim;