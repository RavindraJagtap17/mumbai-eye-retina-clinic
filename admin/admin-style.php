<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;600;700;800&family=Spectral:wght@500;600&display=swap" rel="stylesheet">
<style>
:root{
  --teal:#0e6b6f; --teal-dark:#073d40; --gold:#e0a33b;
  --ink:#13343b; --muted:#5b7178; --line:#e3ebec; --bg:#f4f7f7; --card:#fff;
}
*{box-sizing:border-box}
body{margin:0;font-family:'Mulish',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif;color:var(--ink);background:var(--bg);line-height:1.55}
a{color:var(--teal)}
h1,h2,h3{font-family:'Spectral',Georgia,'Times New Roman',serif;font-weight:600;line-height:1.2;margin:0}

/* ---------- Login ---------- */
.admin-login{display:flex;min-height:100vh;align-items:center;justify-content:center;padding:24px;
  background:linear-gradient(135deg,#073d40,#0e6b6f)}
.login-card{background:var(--card);width:100%;max-width:380px;border-radius:16px;padding:34px 30px;
  box-shadow:0 24px 60px rgba(0,0,0,.25)}
.login-brand{text-align:center;margin-bottom:22px}
.login-brand .brand-mark{display:inline-flex;width:64px;height:64px;align-items:center;justify-content:center;
  background:#f0f6f6;border-radius:50%;margin-bottom:10px}
.login-brand h1{font-size:1.5rem;color:var(--teal-dark)}
.login-brand p{margin:4px 0 0;color:var(--muted);font-size:.9rem}
form label{display:block;font-weight:700;font-size:.85rem;margin-bottom:14px;color:var(--ink)}
form input[type=text],form input[type=password],textarea,select{
  width:100%;margin-top:6px;padding:11px 13px;border:1.5px solid var(--line);border-radius:9px;
  font:inherit;color:var(--ink);background:#fbfdfd}
form input:focus,textarea:focus,select:focus{outline:none;border-color:var(--teal);box-shadow:0 0 0 3px rgba(14,107,111,.12)}
.btn-primary{width:100%;padding:12px;border:0;border-radius:9px;background:var(--teal);color:#fff;
  font-weight:800;font-size:1rem;cursor:pointer;letter-spacing:.2px;transition:background .15s}
.btn-primary:hover{background:var(--teal-dark)}
.hint{font-size:.78rem;color:var(--muted);text-align:center;margin:18px 0 0}
.alert{padding:11px 14px;border-radius:9px;font-size:.88rem;margin-bottom:16px}
.alert-error{background:#fdecec;color:#b3261e;border:1px solid #f5c2c0}
.alert-ok{background:#e8f5ec;color:#1e6b3a;border:1px solid #b6e0c4}

/* ---------- Dashboard shell ---------- */
.admin-top{background:var(--teal-dark);color:#fff;padding:14px 22px;display:flex;align-items:center;
  justify-content:space-between;flex-wrap:wrap;gap:10px}
.admin-top .who{font-size:.85rem;opacity:.85}
.admin-top a.logout{color:#fff;text-decoration:none;border:1.5px solid rgba(255,255,255,.4);
  padding:7px 14px;border-radius:8px;font-weight:700;font-size:.82rem}
.admin-top a.logout:hover{background:rgba(255,255,255,.12)}
.admin-brand{display:flex;align-items:center;gap:10px;font-family:'Spectral',serif;font-size:1.15rem;font-weight:600}
.wrap{max-width:920px;margin:0 auto;padding:26px 20px 60px}
.panel{background:var(--card);border:1px solid var(--line);border-radius:14px;padding:24px;margin-bottom:22px;
  box-shadow:0 6px 18px rgba(7,61,64,.05)}
.panel h2{font-size:1.25rem;color:var(--teal-dark);margin-bottom:4px}
.panel .sub{color:var(--muted);font-size:.88rem;margin:0 0 18px}
.field{margin-bottom:20px}
.field label{font-weight:800;font-size:.9rem;display:block;margin-bottom:4px}
.field .desc{color:var(--muted);font-size:.8rem;margin:0 0 8px}
textarea{min-height:120px;font-family:'SFMono-Regular',Consolas,'Liberation Mono',Menlo,monospace;font-size:.85rem;resize:vertical}
.row-actions{display:flex;gap:12px;align-items:center;flex-wrap:wrap}
.row-actions .btn-primary{width:auto;padding:11px 26px}
.tag{display:inline-block;background:#eef5f5;color:var(--teal-dark);border-radius:999px;padding:3px 11px;
  font-size:.72rem;font-weight:800;letter-spacing:.4px;text-transform:uppercase}
table{width:100%;border-collapse:collapse;font-size:.86rem}
th,td{text-align:left;padding:10px 12px;border-bottom:1px solid var(--line);vertical-align:top}
th{font-size:.72rem;text-transform:uppercase;letter-spacing:.5px;color:var(--muted)}
td.msg{max-width:280px;white-space:pre-wrap}
.empty{color:var(--muted);font-style:italic;padding:14px 0}
.split{display:grid;grid-template-columns:1fr 1fr;gap:18px}
@media(max-width:640px){.split{grid-template-columns:1fr}}
.callout{background:#fff8ec;border:1px solid #f3dcae;border-radius:10px;padding:13px 15px;font-size:.83rem;color:#6b531f;margin-bottom:18px}
.callout code{background:#fff;padding:1px 6px;border-radius:5px;border:1px solid #eadbb6}
</style>
