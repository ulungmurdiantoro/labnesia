/**
 * Labnesia — shared form handler for all site forms.
 *
 * Appends each submission to its own tab in one Google Sheet, based on the
 * "form" field sent by each page's JS. Does not require any npm/build step —
 * this runs entirely inside Google's servers.
 *
 * Forms currently wired up:
 *  - pelatihan-sertifikasi : page-pelatihan-sertifikasi.php, "Daftar Sekarang"   -> sheet "Pendaftaran"
 *  - gap-analysis          : page-mulai-gratis.php, "Daftar GAP Analysis Gratis" -> sheet "Daftar GAP Analysis"
 *  - komunitas             : page-mulai-gratis.php, "Bergabung ke Komunitas"     -> sheet "Bergabung Komunitas"
 *
 * FIRST-TIME SETUP:
 * 1. Create a new Google Sheet (or open an existing one you want submissions in).
 * 2. Extensions → Apps Script. Delete the default code and paste this whole file.
 * 3. Deploy → New deployment → gear icon → "Web app".
 *      - Execute as: Me
 *      - Who has access: Anyone
 *    (It must be "Anyone" — the forms post from public pages with no login.)
 * 4. Click Deploy, authorize the requested permissions, then copy the Web app
 *    URL (ends in /exec).
 * 5. In WordPress: Appearance → Customize → Labnesia Settings → paste that URL
 *    into "Google Apps Script Web App URL (semua form: Pelatihan, GAP Analysis,
 *    Komunitas)".
 *
 * UPDATING AFTER THE FIRST DEPLOY (e.g. adding a new form later):
 * Paste the new code in, then Deploy → Manage deployments → edit (pencil) →
 * Version: New version → Deploy. The Web App URL stays the same, so nothing
 * needs to change in WordPress.
 */
function doPost(e) {
  var p = e.parameter;
  var ss = SpreadsheetApp.getActiveSpreadsheet();

  if (p.form === 'komunitas') {
    appendToSheet(ss, 'Bergabung Komunitas',
      ['Timestamp', 'Nama', 'Email', 'WhatsApp', 'Grup'],
      [new Date(), p.nama || '', p.email || '', p.whatsapp || '', p.grup || '']);
  } else if (p.form === 'gap-analysis') {
    appendToSheet(ss, 'Daftar GAP Analysis',
      ['Timestamp', 'Nama', 'Jabatan', 'Lab & Institusi', 'Bidang Lab', 'WhatsApp', 'Kondisi Lab'],
      [new Date(), p.nama || '', p.jabatan || '', p.institusi || '', p.bidang || '', p.whatsapp || '', p.kondisi || '']);
  } else {
    // "pelatihan-sertifikasi", and the fallback for older client code that
    // doesn't send a form field yet.
    appendToSheet(ss, 'Pendaftaran',
      ['Timestamp', 'Nama', 'WhatsApp', 'Institusi', 'Skema', 'Format'],
      [new Date(), p.nama || '', p.whatsapp || '', p.institusi || '', p.skema || '', p.format || '']);
  }

  return ContentService
    .createTextOutput(JSON.stringify({ status: 'ok' }))
    .setMimeType(ContentService.MimeType.JSON);
}

function appendToSheet(ss, sheetName, headerRow, dataRow) {
  var sheet = ss.getSheetByName(sheetName);
  if (!sheet) {
    sheet = ss.insertSheet(sheetName);
  }
  if (sheet.getLastRow() === 0) {
    sheet.appendRow(headerRow);
  }
  sheet.appendRow(dataRow);
}
