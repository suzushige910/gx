$KeyDir = "$env:USERPROFILE\.ssh"
$KeyName = "id_ed25519"
$KeyPath = Join-Path $KeyDir $KeyName

if (-Not (Test-Path $KeyDir)) {
    New-Item -ItemType Directory -Path $KeyDir | Out-Null
}

Write-Host "🔐 Generating SSH key at $KeyPath ..."

# 対話無効化
cmd /c "echo. | ssh-keygen -t ed25519 -f `"$KeyPath`" -N '' -C `"$env:USERNAME@$(hostname)`""

if (Test-Path "$KeyPath.pub") {
    Write-Host "✅ Public key generated:"
    Get-Content "$KeyPath.pub"
} else {
    Write-Host "❌ Public key not found. Something went wrong."
}