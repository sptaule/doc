        </div>
    </div>
    <script>
        const setup = () => {
            return {
                loading: true,
                isSidebarOpen: true,
                toggleSidebarMenu() {
                    this.isSidebarOpen = !this.isSidebarOpen
                },
                isSettingsPanelOpen: false,
                isSearchBoxOpen: false,
            }
        }
    </script>
    {{ partial('mixed_flash_message') }}
</body>
</html>